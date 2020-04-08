<?php

/*
 *-------------------------------------------------------------------------
 * Define Application Routes
 *-------------------------------------------------------------------------
 *
 * TODO: ADD EXPLANATION
 *
 */

use App\Http\Controllers\HomeController;
use Valkyrja\Http\ResponseFactory;
use Valkyrja\Routing\Router;

\Valkyrja\router()->withController(HomeController::class)->withName('home')->group(
    static function (Router $router) {
        /**
         * Welcome Route.
         * - Example of a view being returned
         *
         * @path /
         */
        $router->get('/', '->welcome()', 'welcome');
        $router->get('/{dynamicValue:alpha}', '->welcome()', 'dynamicValue');

        /**
         * Home Route.
         *
         * @path /home
         */
        $router->get('/home', '->home()', 'home', false)
               ->setDependencies([ResponseFactory::class]);
        $router->get('/homeAutoDependencies', '->home()', 'homeAutoDependencies');

        /**
         * Framework Version Route.
         * - Example of string being returned
         *
         * @path /version
         */
        $router->get('/version', '::version()', 'version');

        /**
         * Property Routing Example Route.
         * - Example of string being returned from a property
         *
         * @path /property
         */
        $router->get('/property', '->propertyRouting', 'property');

        /**
         * Property Routing Example Route.
         * - Example of string being returned from a property
         *
         * @path /property
         */
        $router->get('/static-property', '::staticPropertyRouting', 'staticProperty');
    }
);
