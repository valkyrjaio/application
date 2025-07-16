<?php

declare(strict_types=1);

namespace App\Http;

use Valkyrja\Http\Message\Request\Contract\ServerRequest;
use Valkyrja\Http\Message\Response\Contract\Response;
use Valkyrja\Http\Server\RequestHandler as ValkyrjaRequestHandler;

/**
 * Class RequestHandler.
 */
class RequestHandler extends ValkyrjaRequestHandler
{
    /**
     * @inheritDoc
     */
    public function handle(ServerRequest $request): Response
    {
        return parent::handle($request);
    }

    /**
     * @inheritDoc
     */
    public function terminate(ServerRequest $request, Response $response): void
    {
        parent::terminate($request, $response);
    }

    /**
     * @inheritDoc
     */
    public function run(ServerRequest $request): void
    {
        parent::run($request);
    }
}
