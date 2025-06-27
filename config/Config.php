<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Application\Config\ValkyrjaConfig;

/**
 * Class Config.
 */
class Config extends ValkyrjaConfig
{
    /**
     * @inheritDoc
     */
    public function setConfigFromEnv(string $env): void
    {
    }
}
