<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Valkyrja\Container\Annotation\Service;
use Valkyrja\Http\Factory\Contract\ResponseFactory;
use Valkyrja\Http\Response\Contract\Response;
use Valkyrja\Routing\Annotations\Route;

use function Valkyrja\app;
use function Valkyrja\response;
use function Valkyrja\template;

/**
 * Class HomeController.
 *
 * @Route("path" = "/", "name" = "home")
 * @Service("id" = "Some\\Service\\Id")
 * @Service\Alias("id" = "Some\\Service\\Id", "name" = "homeController")
 * @Service\Context("id" = "Some\\Other\\Service\\Id", "service" = "From\\Some\\Package")
 */
class HomeController extends \Valkyrja\Routing\Controllers\Controller
{
    /**
     * Property routing example.
     *
     * @var string
     *
     * @Route("path" = "/property", "name" = "property")
     */
    public string $propertyRouting = 'Property Routing Example';

    /**
     * Static property routing example.
     *
     * @var string
     *
     * @Route("path" = "/static-property", "name" = "staticProperty")
     * @Route\Any("path" = "/static-property-any", "name" = "staticProperty.any")
     */
    public static string $staticPropertyRouting = 'Static Property Routing Example';

    /**
     * Welcome action.
     * - Example of a view being returned.
     *
     * @return Response
     *
     * @Route("path" = "/", "name" = "welcome")
     * @Route("path" = "/{dynamicValue}", "name" = "dynamicValue", "parameters" = [{"name" = "dynamicValue", "regex" = "[a-zA-Z]+"}])
     */
    public function welcome(): Response
    {
        return self::getResponseFactory()->createResponse(template('index')->render());
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
    public function home(ResponseFactory $responseFactory): Response
    {
        return $responseFactory->view('home/home');
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
    public static function version(): Response
    {
        return response(app()->version());
    }
}
