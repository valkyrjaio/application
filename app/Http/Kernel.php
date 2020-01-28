<?php

namespace App\Http;

use Throwable;
use Valkyrja\Http\NativeKernel;
use Valkyrja\Http\Request;
use Valkyrja\Http\Response;

/**
 * Class Kernel.
 */
class Kernel extends NativeKernel
{
    /**
     * Handle a request.
     *
     * @param Request $request The request
     *
     * @throws Throwable
     *
     * @return Response
     */
    public function handle(Request $request): Response
    {
        return parent::handle($request);
    }

    /**
     * Terminate the kernel request.
     *
     * @param Request  $request  The request
     * @param Response $response The response
     *
     * @return void
     */
    public function terminate(Request $request, Response $response): void
    {
        parent::terminate($request, $response);
    }

    /**
     * Run the kernel.
     *
     * @param Request $request The request
     *
     * @throws Throwable
     *
     * @return void
     */
    public function run(Request $request = null): void
    {
        parent::run($request);
    }
}
