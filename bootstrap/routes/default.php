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
use Valkyrja\Routing\Models\Route;

/*
 * Welcome Route.
 * - Example of a view being returned
 *
 * @path /
 */
router()->get(
    (new Route())
        ->setPath('/')
        ->setName('welcome')
        ->setClass(HomeController::class)
        ->setMethod('welcome')
);

/*
 * Home Route.
 *
 * @path /home
 */
router()->get(
    (new Route())
        ->setPath('/home')
        ->setName('home')
        ->setClass(HomeController::class)
        ->setMethod('home')
);

/*
 * Framework Version Route.
 * - Example of string being returned
 *
 * @path /version
 */
router()->get(
    (new Route())
        ->setPath('/version')
        ->setName('version')
        ->setClass(HomeController::class)
        ->setMethod('version')
        ->setStatic(true)
);

/*
 * Property Routing Example Route.
 * - Example of string being returned from a property
 *
 * @path /property
 */
router()->get(
    (new Route())
        ->setPath('/property')
        ->setName('property')
        ->setClass(HomeController::class)
        ->setProperty('propertyRouting')
);
