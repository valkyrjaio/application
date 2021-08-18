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
use Valkyrja\Routing\Collector;

\Valkyrja\collector()->withController(HomeController::class)->withName('home')->group(
    static function (Collector $collector) {
        /**
         * Welcome Route.
         * - Example of a view being returned
         *
         * @path /
         */
        $collector->get('/', '->welcome()', 'welcome');
        $collector->get('/{dynamicValue}', '->welcome()', 'dynamicValue')
                  ->addParameter('dynamicValue', '[a-zA-Z]+');

        /**
         * Home Route.
         *
         * @path /home
         */
        $collector->get('/home', '->home()', 'home', false)
                  ->setDependencies([ResponseFactory::class]);
        $collector->get('/homeAutoDependencies', '->home()', 'homeAutoDependencies');

        /**
         * Framework Version Route.
         * - Example of string being returned
         *
         * @path /version
         */
        $collector->get('/version', '::version()', 'version');

        /**
         * Property Routing Example Route.
         * - Example of string being returned from a property
         *
         * @path /property
         */
        $collector->get('/property', '->propertyRouting', 'property');

        /**
         * Property Routing Example Route.
         * - Example of string being returned from a property
         *
         * @path /property
         */
        $collector->get('/static-property', '::staticPropertyRouting', 'staticProperty');
    }
);
