<?php

declare(strict_types=1);

namespace Config;

use App\Http\Kernel;
use Valkyrja\Container\Config\Config as Model;
use Valkyrja\Container\Enums\ConfigValue;

use function Valkyrja\cachePath;
use function Valkyrja\servicesPath;

/**
 * Class Container.
 */
class Container extends Model
{
    /**
     * Container constructor.
     */
    public function __construct()
    {
        $this->aliases         = [];
        $this->services        = [];
        $this->contextServices = [];
        $this->providers       = array_merge(
            ConfigValue::PROVIDERS,
            [
                Kernel::class,
            ]
        );
        $this->devProviders    = array_merge(ConfigValue::DEV_PROVIDERS, []);

        $this->filePath                  = servicesPath('default.php');
        $this->cacheFilePath             = cachePath('container.php');
        $this->useAnnotations            = false;
        $this->useAnnotationsExclusively = false;
        $this->useCache                  = false;

        parent::__construct([], false);
    }
}
