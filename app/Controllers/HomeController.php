<?php

namespace App\Controllers;

use Valkyrja\Container\Service;
use Valkyrja\Container\ServiceAlias;
use Valkyrja\Contracts\View\View;
use Valkyrja\Routing\Route;

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
     * - Example of a view being returned
     *
     * @return \Valkyrja\Contracts\View\View
     *
     * @Route(path = '/', name = 'welcome')
     */
    public function welcome(): View
    {
        return view('index')->withoutLayout();
    }

    /**
     * Application version action.
     * - Example of string being returned
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
