<?php

namespace App\Http\Controllers;

use Valkyrja\Container\Annotation\Service;
use Valkyrja\Container\Annotation\ServiceAlias;
use Valkyrja\Routing\Annotation\Route;
use Valkyrja\View\View;

/**
 * Class HomeController.
 *
 * @Route("path" = "/", "name" = "home")
 * @Service("id" = "App\\Http\\Controllers\\HomeController")
 * @ServiceAlias("id" = "App\\Http\\Controllers\\HomeController", "name" = "homeController")
 */
class HomeController
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
     * @return View
     *
     * @Route("path" = "/", "name" = "welcome")
     */
    public function welcome(): View
    {
        return view('index');
    }

    /**
     * Home action.
     *
     * @return View
     *
     * @Route("path" = "/home", "name" = "home", "methods" = ["RequestMethod::GET"])
     */
    public function home(): View
    {
        return view('home/home');
    }

    /**
     * Application version action.
     * - Example of string being returned.
     *
     * @return string
     *
     * @Route\Get("path" = "/version", "name" = "version")
     * @Route\Post("path" = "/version", "name" = "version.post")
     * @Route\Put("path" = "/version/put", "name" = "version.put")
     * @Route\Redirect\Permanent\Put("path" = "/version", "to" = "/version/put", "name" = "version.put.redirect")
     */
    public static function version(): string
    {
        return app()->version();
    }
}
