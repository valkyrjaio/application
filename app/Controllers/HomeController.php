<?php

namespace App\Controllers;

use Valkyrja\Container\Annotations\Service;
use Valkyrja\Container\Annotations\ServiceAlias;
use Valkyrja\View\View;
use Valkyrja\Routing\Annotations\Route;

/**
 * Class HomeController.
 *
 * @Route(path = '/', name = 'home')
 * @Service(id = App\Controllers\HomeController)
 * @ServiceAlias(id = App\Controllers\HomeController, name = 'homeController')
 */
class HomeController extends Controller
{
    /**
     * Property routing example.
     *
     * @var string
     *
     * @Route(path = '/property', name = 'property')
     */
    public $propertyRouting = 'Property Routing Example';

    /**
     * Welcome action.
     * - Example of a view being returned.
     *
     * @return \Valkyrja\View\View
     *
     * @Route(path = '/', name = 'welcome')
     */
    public function welcome(): View
    {
        return view('index');
    }

    /**
     * Home action.
     *
     * @return \Valkyrja\View\View
     *
     * @Route(path = '/home', name = 'home')
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
     * @Route(path = '/version', name = 'version', requestMethods = [[GET | POST | HEAD]])
     */
    public function version(): string
    {
        return app()->version();
    }
}
