<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Valkyrja\Container\Annotation\Service;
use Valkyrja\Http\Message\Factory\Contract\ResponseFactory;
use Valkyrja\Http\Message\Response\Contract\Response;
use Valkyrja\Http\Routing\Annotation\Route;
use Valkyrja\Http\Routing\Attribute\Parameter;
use Valkyrja\Http\Routing\Attribute\Route\Any;
use Valkyrja\Http\Routing\Attribute\Route\Get;
use Valkyrja\Http\Routing\Attribute\Route\Patch;
use Valkyrja\Http\Routing\Attribute\Route\Post;
use Valkyrja\Http\Routing\Attribute\Route\Put;
use Valkyrja\View\Factory\Contract\ResponseFactory as ViewResponseFactory;

use function Valkyrja\app;

/**
 * Class HomeController.
 *
 * @Route("path" = "/", "name" = "home")
 * @Service("id" = "Some\\Service\\Id")
 * @Service\Alias("id" = "Some\\Service\\Id", "name" = "homeController")
 * @Service\Context("id" = "Some\\Other\\Service\\Id", "service" = "From\\Some\\Package")
 */
#[\Valkyrja\Http\Routing\Attribute\Route(path: '/', name: 'home')]
class HomeController extends \Valkyrja\Http\Routing\Controller\Controller
{
    /**
     * Property routing example.
     *
     * @var string
     *
     * @Route("path" = "/property", "name" = "property")
     */
    #[\Valkyrja\Http\Routing\Attribute\Route(path: '/property', name: 'property')]
    public string $propertyRouting = 'Property Routing Example';

    /**
     * Static property routing example.
     *
     * @var string
     *
     * @Route("path" = "/static-property", "name" = "staticProperty")
     * @Route\Any("path" = "/static-property-any", "name" = "staticProperty.any")
     */
    #[\Valkyrja\Http\Routing\Attribute\Route(path: '/static-property', name: 'staticProperty')]
    #[Any(path: '/static-property-any', name: 'staticProperty.any')]
    public static string $staticPropertyRouting = 'Static Property Routing Example';

    /**
     * Welcome action.
     * - Example of a view being returned.
     *
     * @return Response
     *
     * @Route("path" = "/", "name" = "welcome")
     */
    #[\Valkyrja\Http\Routing\Attribute\Route(path: '/', name: 'welcome')]
    public function welcome(ViewResponseFactory $responseFactory): Response
    {
        return $responseFactory->createResponseFromView('index');
    }

    /**
     * Dynamic action.
     * - Example of a view being returned.
     *
     * @return Response
     *
     * @Route("path" = "/{dynamicValue}", "name" = "dynamicValue", "parameters" = [{"name" = "dynamicValue", "regex" = "[a-zA-Z]+"}])
     */
    #[\Valkyrja\Http\Routing\Attribute\Route(path: '/{dynamicValue}', name: 'dynamicValue')]
    #[Parameter(name: 'dynamicValue', regex: '[a-zA-Z]+')]
    public function dynamic(ViewResponseFactory $responseFactory): Response
    {
        return $responseFactory->createResponseFromView('index');
    }

    /**
     * Home action.
     *
     * @param ResponseFactory $responseFactory
     *
     * @return Response
     *
     * @Route("path" = "/home", "name" = "home", "methods" = ["RequestMethod::GET"])
     */
    #[Get(path: '/home', name: 'home')]
    public function home(ViewResponseFactory $responseFactory): Response
    {
        return $responseFactory->createResponseFromView('home/home');
    }

    /**
     * Application version action.
     * - Example of string being returned.
     *
     * @return Response
     *
     * @Route\Get("path" = "/version", "name" = "version")
     * @Route\Post("path" = "/version", "name" = "version.post")
     * @Route\Put("path" = "/version/put", "name" = "version.put")
     * @Route\Redirect\Permanent\Put("path" = "/version", "to" = "/version/put", "name" = "version.put.redirect")
     */
    #[Get(path: '/version', name: 'version')]
    #[Post(path: '/version', name: 'version.post')]
    #[Put(path: '/version', name: 'version.put')]
    #[Patch(path: '/version', name: 'version.patch.redirect', to: '/version/patch')]
    public static function version(ResponseFactory $responseFactory): Response
    {
        return $responseFactory->createResponse(app()->getVersion());
    }
}
