<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Console\Config\Config as Model;
use Valkyrja\Console\Constants\ConfigValue;

use function Valkyrja\cachePath;
use function Valkyrja\commandsPath;

/**
 * Class Console.
 */
class Console extends Model
{
    /**
     * Console constructor.
     */
    public function __construct()
    {
        $this->handlers     = [];
        $this->providers    = array_merge(ConfigValue::PROVIDERS, []);
        $this->devProviders = array_merge(ConfigValue::DEV_PROVIDERS, []);
        $this->quiet        = false;

        $this->useAnnotations            = false;
        $this->useAnnotationsExclusively = false;
        $this->filePath                  = commandsPath('default.php');
        $this->cacheFilePath             = cachePath('commands.php');
        $this->useCache                  = false;

        parent::__construct([], true);
    }
}
