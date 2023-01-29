<?php

declare(strict_types=1);

namespace App\Http;

use Throwable;
use Valkyrja\Http\Request;
use Valkyrja\Http\Response;
use Valkyrja\HttpKernel\Kernels\Kernel as ValkyrjaKernel;

/**
 * Class Kernel.
 */
class Kernel extends ValkyrjaKernel
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
    public function run(Request $request): void
    {
        parent::run($request);
    }
}
