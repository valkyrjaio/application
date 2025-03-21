<?php

declare(strict_types=1);

namespace Config;

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
    protected function setup(array|null $properties = null): void
    {
        parent::setup($properties);

        $this->auth->userEntity = User::class;

        $this->container->providers[] = AppServiceProvider::class;
    }
}
