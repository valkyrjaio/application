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
use Valkyrja\Routing\Facades\Router;

/*
 * Welcome Route.
 * - Example of a view being returned
 *
 * @path /
 */
Router::get('/', HomeController::class . '->welcome()', 'welcome');
Router::get('/{dynamicValue:alpha}', HomeController::class . '->welcome()', 'dynamicValue');

/*
 * Home Route.
 *
 * @path /home
 */
Router::get('/home', HomeController::class . '->home()', 'home');

/*
 * Framework Version Route.
 * - Example of string being returned
 *
 * @path /version
 */
Router::get('/version', HomeController::class . '::version()', 'version');

/*
 * Property Routing Example Route.
 * - Example of string being returned from a property
 *
 * @path /property
 */
Router::get('/property', HomeController::class . '->propertyRouting', 'property');

/*
 * Property Routing Example Route.
 * - Example of string being returned from a property
 *
 * @path /property
 */
Router::get('/static-property', HomeController::class . '::staticPropertyRouting', 'staticProperty');
