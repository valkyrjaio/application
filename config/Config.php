<?php

declare(strict_types=1);

namespace Config;

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
    }
}
