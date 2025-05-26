<?php

declare(strict_types=1);

namespace Config;

use App\ORM\Entities\User;
use App\Providers\AppServiceProvider;
use Valkyrja\Config\Config\ValkyrjaDataConfig;

/**
 * Class Config.
 */
class DataConfig extends ValkyrjaDataConfig
{
    /**
     * @inheritDoc
     */
    protected function setConfigFromEnv(string $env): void
    {
        parent::setConfigFromEnv($env);

        $this->auth->defaultUserEntity = User::class;

        $this->container->providers[] = AppServiceProvider::class;
    }
}
