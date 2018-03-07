<?php

namespace App\Http\Middleware;

use Valkyrja\Http\Request;
use Valkyrja\Http\Response;
use Valkyrja\Support\Middleware\Middleware;

/**
 * Class ExampleMiddleware.
 */
class ExampleMiddleware extends Middleware
{
    /**
     * Middleware handler for before a request is dispatched.
     *
     * @param Request $request The request
     *
     * @return \Valkyrja\Http\Request|\Valkyrja\Http\Response
     */
    public static function before(Request $request)
    {
        // Do logic using the request before it is processed by the controller action, here

        return $request;
    }

    /**
     * Middleware handler for after a request is dispatched.
     *
     * @param Request  $request  The request
     * @param Response $response The response
     *
     * @return \Valkyrja\Http\Response
     */
    public static function after(Request $request, Response $response): Response
    {
        // Modify the response after its been processed by the controller action, here

        return $response;
    }

    /**
     * Middleware handler run when the application is terminating.
     *
     * @param Request  $request  The request
     * @param Response $response The response
     *
     * @return void
     */
    public static function terminate(Request $request, Response $response): void
    {
        // Do stuff after termination (after the response has been sent) here
    }
}
