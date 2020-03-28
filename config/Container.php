<?php

declare(strict_types=1);

namespace Config;

use App\Http\Kernel;
use Valkyrja\Config\Configs\Container as Model;
use Valkyrja\Container\Enums\Config;
use Valkyrja\Support\Providers\Provider;

use function Valkyrja\cachePath;
use function Valkyrja\servicesPath;

/**
 * Class Container.
 */
class Container extends Model
{
    /**
     * The annotated service aliases.
     *
     * @var string[]
     */
    public array $aliases = [];

    /**
     * The annotated services.
     *
     * @var string[]
     */
    public array $services = [];

    /**
     * The annotated context services.
     *
     * @var string[]
     */
    public array $contextServices = [];

    /**
     * The command providers.
     *
     * @var Provider[]|string[]
     */
    public array $providers = [
        Kernel::class,
    ];

    /**
     * The dev command providers.
     *
     * @var Provider[]|string[]
     */
    public array $devProviders = [];

    /**
     * Container constructor.
     */
    public function __construct()
    {
        parent::__construct(false);

        $this->setAliases($this->aliases);
        $this->setServices($this->services);
        $this->setContextServices($this->contextServices);
        $this->setProviders(array_merge(Config::PROVIDERS, $this->providers));
        $this->setDevProviders(array_merge(Config::DEV_PROVIDERS, $this->devProviders));

        $this->setFilePath(servicesPath('default.php'));
        $this->setCacheFilePath(cachePath('container.php'));
        $this->setUseCache(false);
        $this->setUseAnnotations(false);
        $this->setUseAnnotationsExclusively(false);
    }
}
