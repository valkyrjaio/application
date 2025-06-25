<?php

declare(strict_types=1);

namespace Config;

use App\Cli\Controllers\TestCommand;
use App\Http\Controllers\HomeController;
use App\ORM\Entities\User;
use App\Providers\AppServiceProvider;
use Valkyrja\Application\Config\Valkyrja;
use Valkyrja\Http\Routing\Middleware\ViewRouteNotMatchedMiddleware;
use Valkyrja\Http\Server\Middleware\LogThrowableCaughtMiddleware;
use Valkyrja\Http\Server\Middleware\ViewThrowableCaughtMiddleware;

/**
 * Class Config.
 */
class Config extends Valkyrja
{
    /**
     * @inheritDoc
     */
    protected function setConfigFromEnv(string $env): void
    {
        parent::setConfigFromEnv($env);

        $this->auth->defaultUserEntity = User::class;

        $this->container->providers[] = AppServiceProvider::class;

        $this->cliRouting->controllers[] = TestCommand::class;

        $this->httpMiddleware->routeNotMatched[] = ViewRouteNotMatchedMiddleware::class;
        $this->httpMiddleware->throwableCaught[] = LogThrowableCaughtMiddleware::class;
        $this->httpMiddleware->throwableCaught[] = ViewThrowableCaughtMiddleware::class;

        $this->httpRouting->controllers[] = HomeController::class;
    }
}
