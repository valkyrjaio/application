<?php

declare(strict_types=1);

namespace Config;

use App\Http\Kernel;
use App\ORM\Entities\User;
use App\Providers\AppServiceProvider;
use Valkyrja\Config\Config\Valkyrja as Model;

/**
 * Class Config.
 */
class Config extends Model
{
    /**
     * @inheritDoc
     */
    protected function setup(array $properties = null): void
    {
        parent::setup($properties);

        $this->app->httpKernel = Kernel::class;

        $this->auth->userEntity = User::class;

        $this->container->providers = [
            ...$this->container->providers,
            ...[
                AppServiceProvider::class,
            ],
        ];
    }
}
