<?php

declare(strict_types=1);

namespace App\Http;

use Throwable;
use Valkyrja\Http\Message\Request\Contract\ServerRequest;
use Valkyrja\Http\Message\Response\Contract\Response;
use Valkyrja\Http\Server\RequestHandler as ValkyrjaKernel;

/**
 * Class Kernel.
 */
class Kernel extends ValkyrjaKernel
{
    /**
     * Handle a request.
     *
     * @param ServerRequest $request The request
     *
     * @throws Throwable
     *
     * @return Response
     */
    public function handle(ServerRequest $request): Response
    {
        return parent::handle($request);
    }

    /**
     * Terminate the kernel request.
     *
     * @param ServerRequest $request  The request
     * @param Response      $response The response
     *
     * @return void
     */
    public function terminate(ServerRequest $request, Response $response): void
    {
        parent::terminate($request, $response);
    }

    /**
     * Run the kernel.
     *
     * @param ServerRequest $request The request
     *
     * @throws Throwable
     *
     * @return void
     */
    public function run(ServerRequest $request): void
    {
        parent::run($request);
    }
}
