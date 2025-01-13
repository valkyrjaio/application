<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Valkyrja\Http\Message\Request\Contract\ServerRequest;
use Valkyrja\Http\Message\Response\Contract\Response;
use Valkyrja\Http\MiddlewareOld\Middleware;

/**
 * Class ExampleMiddleware.
 */
class ExampleMiddleware extends Middleware
{
    /**
     * Middleware handler for before a request is dispatched.
     *
     * @param ServerRequest $request The request
     *
     * @return ServerRequest|Response
     */
    public static function before(ServerRequest $request)
    {
        // Do logic using the request before it is processed by the controller action, here

        return $request;
    }

    /**
     * Middleware handler for after a request is dispatched.
     *
     * @param ServerRequest $request  The request
     * @param Response      $response The response
     *
     * @return Response
     */
    public static function after(ServerRequest $request, Response $response): Response
    {
        // Modify the response after its been processed by the controller action, here

        return $response;
    }

    /**
     * Middleware handler run when the application is terminating.
     *
     * @param ServerRequest $request  The request
     * @param Response      $response The response
     *
     * @return void
     */
    public static function terminate(ServerRequest $request, Response $response): void
    {
        // Do stuff after termination (after the response has been sent) here
    }
}
