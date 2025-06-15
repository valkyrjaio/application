<?php

declare(strict_types=1);

namespace Config;

use App\Http\Controllers\HomeController;
use App\ORM\Entities\User;
use App\Providers\AppServiceProvider;
use Valkyrja\Application\Config\Valkyrja;

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

        $this->httpRouting->controllers[] = HomeController::class;
    }
}
