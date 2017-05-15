<?php

use Valkyrja\Routing\Route;

/**
 * Welcome Route.
 * - Example of a view being returned
 *
 * @path /
 */
router()->get(
    (new Route())
        ->setPath('/')
        ->setName('welcome')
        ->setClass(App\Controllers\HomeController::class)
        ->setMethod('welcome')
);

/**
 * Framework Version Route.
 * - Example of string being returned
 *
 * @path /version
 */
router()->get(
    (new Route())
        ->setPath('/version')
        ->setName('version')
        ->setClass(App\Controllers\HomeController::class)
        ->setMethod('version')
);

/**
 * Property Routing Example Route.
 * - Example of string being returned from a property
 *
 * @path /property
 */
router()->get(
    (new Route())
        ->setPath('/property')
        ->setName('property')
        ->setClass(App\Controllers\HomeController::class)
        ->setProperty('propertyRouting')
);
