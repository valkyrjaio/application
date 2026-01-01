<?php

declare(strict_types=1);

namespace App\Http;

use Valkyrja\Http\Message\Request\Contract\ServerRequestContract;
use Valkyrja\Http\Message\Response\Contract\ResponseContract;
use Valkyrja\Http\Server\Handler\RequestHandler as ValkyrjaRequestHandler;

/**
 * Class RequestHandler.
 */
class RequestHandler extends ValkyrjaRequestHandler
{
    /**
     * @inheritDoc
     */
    public function handle(ServerRequestContract $request): ResponseContract
    {
        return parent::handle($request);
    }

    /**
     * @inheritDoc
     */
    public function terminate(ServerRequestContract $request, ResponseContract $response): void
    {
        parent::terminate($request, $response);
    }

    /**
     * @inheritDoc
     */
    public function run(ServerRequestContract $request): void
    {
        parent::run($request);
    }
}
