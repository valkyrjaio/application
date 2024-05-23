<?php

namespace Tests\Traits;

use Valkyrja\Http\Message\Response\Contract\Response;
use Valkyrja\Http\RequestMethod;
use Valkyrja\Http\StatusCode;

/**
 * Trait TestRequest.
 */
trait TestRequest
{
    /**
     * Call the given URI and return the Response.
     *
     * @param string $uri        The uri to call
     * @param string $method     [optional] The method to use
     * @param array  $parameters [optional] Query parameters for the request
     * @param array  $cookies    [optional] Cookies for the request
     * @param array  $files      [optional] Files for the request
     * @param array  $server     [optional] Server variables for the request
     * @param string $content    [optional] Content for the request
     *
     * @return \Valkyrja\Http\Message\Response\Contract\Response
     */
    public function call(
        $uri,
        $method = RequestMethod::GET,
        $parameters = [],
        $cookies = [],
        $files = [],
        $server = [],
        $content = null
    ): Response {
        /** @var \Valkyrja\Http\Message\Request\Contract\ServerRequest $request */
        $request = $this->app->request();

        // If all routes should have a trailing slash
        // and the uri doesn't already end with a slash
        if (true === config()['routing']['trailingSlash'] && false === strpos($uri, '/', -1)) {
            // Add a trailing slash
            $uri .= '/';
        }

        $request = $request::create($uri, $method, $parameters, $cookies, $files, $server, $content);

        return $this->app->kernel()->handle($request);
    }

    /**
     * Assert that a given call has an ok status code.
     *
     * @param string $uri        The uri to call
     * @param string $method     [optional] The method to use
     * @param array  $parameters [optional] Query parameters for the request
     * @param array  $cookies    [optional] Cookies for the request
     * @param array  $files      [optional] Files for the request
     * @param array  $server     [optional] Server variables for the request
     * @param string $content    [optional] Content for the request
     *
     * @return void
     */
    public function assertCallOk(
        $uri,
        $method = RequestMethod::GET,
        $parameters = [],
        $cookies = [],
        $files = [],
        $server = [],
        $content = null
    ): void {
        $response = $this->call($uri, $method, $parameters, $cookies, $files, $server, $content);

        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
    }

    /**
     * Assert that a given call has a 404 not found status code.
     *
     * @param string $uri        The uri to call
     * @param string $method     [optional] The method to use
     * @param array  $parameters [optional] Query parameters for the request
     * @param array  $cookies    [optional] Cookies for the request
     * @param array  $files      [optional] Files for the request
     * @param array  $server     [optional] Server variables for the request
     * @param string $content    [optional] Content for the request
     *
     * @return void
     */
    public function assertCallNotFound(
        $uri,
        $method = RequestMethod::GET,
        $parameters = [],
        $cookies = [],
        $files = [],
        $server = [],
        $content = null
    ): void {
        $response = $this->call($uri, $method, $parameters, $cookies, $files, $server, $content);

        $this->assertEquals(StatusCode::NOT_FOUND, $response->getStatusCode());
    }

    /**
     * Assert that a given call has a redirect status code.
     *
     * @param string $uri        The uri to call
     * @param string $method     [optional] The method to use
     * @param array  $parameters [optional] Query parameters for the request
     * @param array  $cookies    [optional] Cookies for the request
     * @param array  $files      [optional] Files for the request
     * @param array  $server     [optional] Server variables for the request
     * @param string $content    [optional] Content for the request
     *
     * @return void
     */
    public function assertCallRedirects(
        $uri,
        $method = RequestMethod::GET,
        $parameters = [],
        $cookies = [],
        $files = [],
        $server = [],
        $content = null
    ): void {
        $response = $this->call($uri, $method, $parameters, $cookies, $files, $server, $content);

        $this->assertEquals(true, $response->isRedirect());
    }

    /**
     * Assert that a given call has a redirect or not found status code.
     *
     * @param string $uri        The uri to call
     * @param string $method     [optional] The method to use
     * @param array  $parameters [optional] Query parameters for the request
     * @param array  $cookies    [optional] Cookies for the request
     * @param array  $files      [optional] Files for the request
     * @param array  $server     [optional] Server variables for the request
     * @param string $content    [optional] Content for the request
     *
     * @return void
     */
    public function assertCallRedirectsOrNotFound(
        $uri,
        $method = RequestMethod::GET,
        $parameters = [],
        $cookies = [],
        $files = [],
        $server = [],
        $content = null
    ): void {
        $response = $this->call($uri, $method, $parameters, $cookies, $files, $server, $content);

        $this->assertEquals(true, $response->isRedirect() || $response->isNotFound());
    }
}
