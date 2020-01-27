<?php

namespace App\Http\Controllers;

use Valkyrja\Container\Annotations\Service;
use Valkyrja\Container\Annotations\ServiceAlias;
use Valkyrja\Routing\Annotations\Route;
use Valkyrja\View\View;

/**
 * Class HomeController.
 *
 * @Route("path" = "/", "name" = "home")
 * @Service("id" = "App\\Http\\Controllers\\HomeController")
 * @ServiceAlias("id" = "App\\Http\\Controllers\\HomeController", "name" = "homeController")
 */
class HomeController extends Controller
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
     * @Route("path" = "/home", "name" = "home")
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
     * @Route("path" = "/version", "name" = "version", "requestMethods" = ["GET", "POST", "HEAD"])
     */
    public function version(): string
    {
        return app()->version();
    }
}
