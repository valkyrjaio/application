<?php

/*
 * This file is part of the Valkyrja framework.
 *
 * (c) Melech Mizrachi
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Valkyrja\Routing;

use Closure;

use Valkyrja\Contracts\Application as ApplicationContract;
use Valkyrja\Contracts\Http\Controller as ControllerContract;
use Valkyrja\Contracts\Http\Request as RequestContract;
use Valkyrja\Contracts\Http\Response as ResponseContract;
use Valkyrja\Contracts\Routing\Annotations\RouteParser as RouteParserContract;
use Valkyrja\Contracts\Routing\Router as RouterContract;
use Valkyrja\Contracts\View\View as ViewContract;
use Valkyrja\Http\Exceptions\InvalidControllerException;
use Valkyrja\Http\Exceptions\NonExistentActionException;
use Valkyrja\Http\RequestMethod;
use Valkyrja\Http\ResponseCode;

/**
 * Class Router
 *
 * @package Valkyrja\Http
 *
 * @author  Melech Mizrachi
 */
class Router implements RouterContract
{
    /**
     * The static routes name.
     *
     * @constant string
     */
    protected const STATIC_ROUTES_NAME = 'static';

    /**
     * The dynamic routes name.
     */
    protected const DYNAMIC_ROUTES_NAME = 'dynamic';

    /**
     * Application.
     *
     * @var \Valkyrja\Contracts\Application
     */
    protected $app;

    /**
     * Application routes.
     *
     * @var array
     */
    protected $routes = [
        self::STATIC_ROUTES_NAME  => [
            RequestMethod::GET    => [],
            RequestMethod::POST   => [],
            RequestMethod::PUT    => [],
            RequestMethod::PATCH  => [],
            RequestMethod::DELETE => [],
            RequestMethod::HEAD   => [],
        ],
        self::DYNAMIC_ROUTES_NAME => [
            RequestMethod::GET    => [],
            RequestMethod::POST   => [],
            RequestMethod::PUT    => [],
            RequestMethod::PATCH  => [],
            RequestMethod::DELETE => [],
            RequestMethod::HEAD   => [],
        ],
    ];

    /**
     * Router constructor.
     *
     * @param \Valkyrja\Contracts\Application $application
     */
    public function __construct(ApplicationContract $application)
    {
        $this->app = $application;
    }

    /**
     * Set a single route.
     *
     * @param \Valkyrja\Http\RequestMethod $method    The method type
     * @param string                       $path      The path to set
     * @param array                        $options   The closure or array of options
     * @param bool                         $isDynamic [optional] Whether the route has parameters
     *
     * @return void
     *
     * @throws \Valkyrja\Http\Exceptions\NonExistentActionException
     */
    public function addRoute(RequestMethod $method, string $path, array $options, bool $isDynamic = false): void
    {
        // Let's check the action method is callable before proceeding
        if (! isset($options['handler']) && ! is_callable(
                [
                    $options['controller'],
                    $options['action'],
                ]
            )
        ) {
            throw new NonExistentActionException(
                'Action does not exist in controller for route : '
                . $path
                . $options['controller']
                . '@'
                . $options['action']
            );
        }

        // If all routes should have a trailing slash
        // and the route doesn't already end with a slash
        if ($this->app->config()->routing->trailingSlash && false === strpos($path, '/', -1)) {
            // Add a trailing slash
            $path .= '/';
        }

        $route = [
            'path'       => $path,
            'name'       => $options['name'] ?? $path,
            'controller' => $options['controller'] ?? false,
            'action'     => $options['action'] ?? false,
            'handler'    => $options['handler'] ?? false,
            'injectable' => $options['injectable'] ?? [],
            'params'     => [],
        ];

        // If this is a dynamic route
        if ($isDynamic) {
            // Get all matches for {paramName} and {paramName:(validator)} in the path
            preg_match_all(
                '/' . static::VARIABLE_REGEX . '/x',
                $path,
                $params
            );

            // Run through all matches
            foreach ($params[0] as $key => $param) {
                // Check if a global regex alias was used
                switch ($params[2][$key]) {
                    case 'num' :
                        $replacement = '(\d+)';
                        break;
                    case 'slug' :
                        $replacement = '([a-zA-Z0-9-]+)';
                        break;
                    case 'alpha' :
                        $replacement = '([a-zA-Z]+)';
                        break;
                    case 'alpha-lowercase' :
                        $replacement = '([a-z]+)';
                        break;
                    case 'alpha-uppercase' :
                        $replacement = '([A-Z]+)';
                        break;
                    case 'alpha-num' :
                        $replacement = '([a-zA-Z0-9]+)';
                        break;
                    case 'alpha-num-underscore' :
                        $replacement = '(\w+)';
                        break;
                    default :
                        // Check if a regex was set for this match, otherwise use a wildcard all
                        $replacement = $params[2][$key] ?: '(.*)';
                        break;
                }

                // Replace the matches with a regex
                $path = str_replace($param, $replacement, $path);
            }

            $route['params'] = $params;

            $path = str_replace('/', '\/', $path);
            $path = '/^' . $path . '$/';
            $route['dynamicPath'] = $path;

            // Set it in the dynamic routes array
            $this->routes[static::DYNAMIC_ROUTES_NAME][(string) $method][$path] = $route;
        }
        // Otherwise set it in the static routes array
        else {
            $this->routes[static::STATIC_ROUTES_NAME][(string) $method][$path] = $route;
        }
    }

    /**
     * Helper function to set a GET addRoute.
     *
     * @param string $path      The path to set
     * @param array  $options   The closure or array of options
     * @param bool   $isDynamic [optional] Does the route have dynamic parameters?
     *
     * @return void
     *
     * @throws \Exception
     */
    public function get(string $path, array $options, bool $isDynamic = false): void
    {
        $this->addRoute(new RequestMethod(RequestMethod::GET), $path, $options, $isDynamic);
    }

    /**
     * Helper function to set a POST addRoute.
     *
     * @param string $path      The path to set
     * @param array  $options   The closure or array of options
     * @param bool   $isDynamic [optional] Does the route have dynamic parameters?
     *
     * @return void
     *
     * @throws \Exception
     */
    public function post(string $path, array $options, bool $isDynamic = false): void
    {
        $this->addRoute(new RequestMethod(RequestMethod::POST), $path, $options, $isDynamic);
    }

    /**
     * Helper function to set a PUT addRoute.
     *
     * @param string $path      The path to set
     * @param array  $options   The closure or array of options
     * @param bool   $isDynamic [optional] Does the route have dynamic parameters?
     *
     * @return void
     *
     * @throws \Exception
     */
    public function put(string $path, array $options, bool $isDynamic = false): void
    {
        $this->addRoute(new RequestMethod(RequestMethod::PUT), $path, $options, $isDynamic);
    }

    /**
     * Helper function to set a PATCH addRoute.
     *
     * @param string $path      The path to set
     * @param array  $options   The closure or array of options
     * @param bool   $isDynamic [optional] Does the route have dynamic parameters?
     *
     * @return void
     *
     * @throws \Exception
     */
    public function patch(string $path, array $options, bool $isDynamic = false): void
    {
        $this->addRoute(new RequestMethod(RequestMethod::PATCH), $path, $options, $isDynamic);
    }

    /**
     * Helper function to set a DELETE addRoute.
     *
     * @param string $path      The path to set
     * @param array  $options   The closure or array of options
     * @param bool   $isDynamic [optional] Does the route have dynamic parameters?
     *
     * @return void
     *
     * @throws \Exception
     */
    public function delete(string $path, array $options, bool $isDynamic = false): void
    {
        $this->addRoute(new RequestMethod(RequestMethod::DELETE), $path, $options, $isDynamic);
    }

    /**
     * Helper function to set a HEAD addRoute.
     *
     * @param string $path      The path to set
     * @param array  $options   The closure or array of options
     * @param bool   $isDynamic [optional] Does the route have dynamic parameters?
     *
     * @return void
     *
     * @throws \Exception
     */
    public function head(string $path, array $options, bool $isDynamic = false): void
    {
        $this->addRoute(new RequestMethod(RequestMethod::HEAD), $path, $options, $isDynamic);
    }

    /**
     * Set routes from a given array of routes.
     *
     * @param array $routes The routes to set
     *
     * @return void
     */
    public function setRoutes(array $routes): void
    {
        $this->routes = $routes;
    }

    /**
     * Get all routes set by the application.
     *
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    /**
     * Get routes by method type.
     *
     * @param string $method The method type of get
     * @param string $type   [optional] The type of routes (static/dynamic)
     *
     * @return array
     */
    protected function getRoutesByMethod(string $method, string $type = self::STATIC_ROUTES_NAME): array
    {
        return $this->routes[$type][$method];
    }

    /**
     * Get a route by name.
     *
     * @param string $name   The name of the route to get
     * @param string $method [optional] The method type of get
     * @param string $type   [optional] The type of routes (static/dynamic)
     *
     * @return array
     */
    public function getRouteByName(string $name, string $method = RequestMethod::GET, string $type = self::STATIC_ROUTES_NAME): array
    {
        $match = [];

        // Iterate through the routes of the type and method
        foreach ($this->getRoutesByMethod($method, $type) as $index => $route) {
            // If the route name matches the name we're trying to find
            if ($route['name'] === $name) {
                // Set the match as this route
                $match = $route;

                // Break as we have found our match
                break;
            }
        }

        return $match;
    }

    /**
     * Get a route url by name.
     *
     * @param string $name   The name of the route to get
     * @param string $method [optional] The method type of get
     * @param array  $data   [optional] The route data if dynamic
     *
     * @return string
     */
    public function getRouteUrlByName(string $name, array $data = [], string $method = RequestMethod::GET): string
    {
        // Get the matching route
        $route = $this->getRouteByName($name, $method, empty($data) ? static::STATIC_ROUTES_NAME
            : static::DYNAMIC_ROUTES_NAME);

        // If no route was found
        if (! $route) {
            // Return an empty string
            return '';
        }

        // Set the path as the route's path
        $path = $route['path'];

        // If there is data
        if ($data) {
            // Get the route's params
            $params = $route['params'];

            // Iterate through all the prams
            foreach ($params[0] as $key => $param) {
                // Set the path by replacing the params with the data arguments
                $path = str_replace($param, $data[$params[1][$key]], $path);
            }

            return $path;
        }

        return $path;
    }

    /**
     * Setup routes.
     *
     * @return void
     *
     * @throws \InvalidArgumentException
     * @throws \Valkyrja\Http\Exceptions\InvalidMethodTypeException
     * @throws \Valkyrja\Http\Exceptions\NonExistentActionException
     */
    public function setupRoutes(): void
    {
        // If the application should use the routes cache file
        if ($this->app->config()->routing->useRoutesCacheFile) {
            // Set the application routes with said file
            $this->routes = require $this->app->config()->routing->routesCacheFile;

            // Then return out of routes setup
            return;
        }

        // If annotations are enabled and routing should use annotations
        if ($this->app->config()->routing->useAnnotations && $this->app->config()->annotations->enabled) {
            // Routes array
            $routes = [];
            // The routes annotations parser
            /** @var RouteParserContract $parser */
            $parser = $this->app->container()->get(RouteParserContract::class);

            // Iterate through each controller
            foreach ($this->app->config()->routing->controllers as $controller) {
                // Get a reflection of the controller
                $reflection = new \ReflectionClass($controller);
                /** @var \Valkyrja\Routing\Models\Route[] $controllerRoutes */
                $controllerRoutes = $parser->getAnnotations($reflection->getDocComment());

                // Iterate through all the methods in the controller
                foreach ($reflection->getMethods() as $method) {
                    // Get the @Route annotation for the method
                    $actionRoutes = $parser->getAnnotations($method->getDocComment());

                    // Ensure a route was defined
                    if ($actionRoutes) {
                        // Setup to find any injectable objects through the service container
                        $injectable = [];

                        // Iterate through the method's parameters
                        foreach ($method->getParameters() as $parameter) {
                            // We only care for classes
                            if ($parameter->getClass()) {
                                // Set the injectable in the array
                                $injectable[] = $parameter->getClass()->getName();
                            }
                        }

                        /**
                         * Iterate through all the action's routes.
                         *
                         * @var \Valkyrja\Routing\Models\Route $route
                         */
                        foreach ($actionRoutes as $route) {
                            // Set the controller
                            $route->setController($controller);
                            // Set the action
                            $route->setAction($method->getName());
                            // Set the injectable objects
                            $route->setInjectables($injectable);

                            // If controller routes exist
                            if ($controllerRoutes) {
                                // Iterate through the controller defined base routes
                                foreach ($controllerRoutes as $controllerRoute) {
                                    // Clone the route found for the method and begin applying the controller
                                    // base route to it
                                    $newRoute = clone $route;

                                    // If there is a base path for this controller
                                    if (null !== $controllerPath = $controllerRoute->getPath()) {
                                        // Get the route's path
                                        $path = $route->getPath();

                                        // If this is the index
                                        if ('/' === $path) {
                                            // Set to blank so the final path will be just the base path
                                            $path = '';
                                        }
                                        // If the controller route is the index
                                        else if ('/' === $controllerPath) {
                                            // Set to blank so the final path won't start with double slash
                                            $controllerPath = '';
                                        }

                                        // Set the path to the base path and route path
                                        $newRoute->setPath($controllerPath . $path);
                                    }

                                    // If there is a base name for this controller
                                    if (null !== $controllerName = $controllerRoute->getName()) {
                                        $name = $controllerName . '.' . $route->getName();

                                        // Set the name to the base name and route name
                                        $newRoute->setName($name);
                                    }

                                    // If the base is dynamic
                                    if (false !== $controllerRoute->getDynamic()) {
                                        // Set the route to dynamic
                                        $newRoute->setDynamic(true);
                                    }

                                    // Add the route to the array
                                    $routes[] = $newRoute;
                                }
                            }
                            // Otherwise there was no route defined on the controller level
                            else {
                                // So just add the route to the list
                                $routes[] = $route;
                            }
                        }
                    }
                }
            }

            // Iterate through the routes
            foreach ($routes as $route) {
                // Set the route
                $this->addRoute(
                    new RequestMethod($route->getMethod() ?? RequestMethod::GET),
                    $route->getPath(),
                    [
                        'name'       => $route->getName(),
                        'controller' => $route->getController(),
                        'action'     => $route->getAction(),
                        'injectable' => $route->getInjectables(),
                    ],
                    $route->getDynamic()
                );
            }

            // If only annotations should be used for routing
            if ($this->app->config()->routing->useAnnotationsExclusively) {
                // Return to avoid loading routes file
                return;
            }
        }

        // Include the routes file
        // NOTE: Included if annotations are set or not due to possibility of routes being defined
        // within the controllers as well as within the routes file
        require $this->app->config()->routing->routesFile;
    }

    /**
     * Dispatch the route and find a match.
     *
     * @param \Valkyrja\Contracts\Http\Request $request The request
     *
     * @return \Valkyrja\Contracts\Http\Response
     *
     * @throws \Valkyrja\Contracts\Http\Exceptions\HttpException
     * @throws \Valkyrja\Http\Exceptions\InvalidControllerException
     */
    public function dispatch(RequestContract $request): ResponseContract
    {
        $requestMethod = $request->getMethod();
        $requestUri = $request->getPathClean();

        // Decode the request uri
        $requestUri = rawurldecode($requestUri);

        $arguments = [];
        $hasArguments = false;
        $route = [];
        $matches = false;
        $dispatch = false;

        // Let's check if the route is set in the static routes
        if (isset($this->routes[static::STATIC_ROUTES_NAME][$requestMethod][$requestUri])) {
            $route = $this->routes[static::STATIC_ROUTES_NAME][$requestMethod][$requestUri];
        }
        // If trailing slashes and non trailing are allowed check it too
        else if (
            $this->app->config()->routing->allowWithTrailingSlash &&
            isset($this->routes[static::STATIC_ROUTES_NAME][$requestMethod][substr($requestUri, 0, -1)])
        ) {
            $route = $this->routes[static::STATIC_ROUTES_NAME][$requestMethod][substr($requestUri, 0, -1)];
        }
        // Otherwise check dynamic routes for a match
        else {
            // Attempt to find a match using dynamic routes that are set
            foreach ($this->getRoutesByMethod($requestMethod, static::DYNAMIC_ROUTES_NAME) as $path => $dynamicRoute) {
                // If the preg match is successful, we've found our route!
                if (preg_match($path, $requestUri, $matches)) {
                    $route = $dynamicRoute;
                    break;
                }
            }
        }

        // If no route is found
        if (! $route) {
            // Launch the 404 and abort the app
            $this->app->abort(ResponseCode::HTTP_NOT_FOUND);
        }

        // Set the action from the route to either the handler or controller action
        $action = $route['handler']
            ?: $route['action'];
        // The injectable objects
        $injectable = $route['injectable']
            ?: [];

        // If there are injectable items defined for this route
        if ($injectable) {
            // There are arguments to be had
            $hasArguments = true;

            // Check for any injectable objects that have been set on the route
            foreach ($injectable as $injectableObject) {
                // Set these as the first set of arguments to pass to the action
                $arguments[] = $this->app->container()->get($injectableObject);
            }
        }

        // If there were matches from the dynamic route
        if ($matches && is_array($matches)) {
            // There are arguments to be had
            $hasArguments = true;

            // Iterate through the matches
            foreach ($matches as $index => $match) {
                // Disregard the first match (which is the route itself)
                if ($index === 0) {
                    continue;
                }

                // Set the remaining arguments to pass to the action with those matches
                $arguments[] = $match;
            }
        }

        // If the action is a callable closure
        if ($action instanceof Closure) {
            // If there are arguments and they should be passed in individually
            if ($hasArguments) {
                // Call it and set it as our dispatch
                $dispatch = $action(...$arguments);
            }
            // Otherwise no arguments just call the action
            else {
                // Call it and set it as our dispatch
                $dispatch = $action();
            }
        }
        // Otherwise the action should be a method in a controller
        else if ($action && $route['controller']) {
            // Set the controller through the container
            $controller = $this->app->container()->get($route['controller']);

            // Let's make sure the controller is a controller
            if (! $controller instanceof ControllerContract) {
                throw new InvalidControllerException(
                    'Invalid controller for route : '
                    . $route['path']
                    . ' Controller -> '
                    . $route['controller']
                );
            }

            // If there are arguments
            if ($hasArguments) {
                // Set the dispatch as the controller action
                $dispatch = $controller->$action(...$arguments);
            }
            // Otherwise no arguments just call the action
            else {
                // Set the dispatch as the controller action
                $dispatch = $controller->$action();
            }

            // Call the controller's after method
            $controller->after();
        }

        // If the dispatch failed, 404
        if (! $dispatch) {
            $this->app->abort(ResponseCode::HTTP_NOT_FOUND);
        }

        // If the dispatch is a Response then simply return it
        if ($dispatch instanceof ResponseContract) {
            return $dispatch;
        }
        // If the dispatch is a View, render it then wrap it in a new response and return it
        if ($dispatch instanceof ViewContract) {
            return $this->app->response($dispatch->render());
        }

        // Otherwise its a string so wrap it in a new response and return it
        return $this->app->response((string) $dispatch);
    }
}
