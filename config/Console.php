<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Configs\Console as Model;
use Valkyrja\Console\Enums\Config;
use Valkyrja\Support\Providers\Provider;

use function Valkyrja\cachePath;
use function Valkyrja\commandsPath;

/**
 * Class Console.
 */
class Console extends Model
{
    /**
     * The annotated command handlers.
     *
     * @var string[]
     */
    public array $handlers = [];

    /**
     * The command providers.
     *
     * @var Provider[]|string[]
     */
    public array $providers = [];

    /**
     * The dev command providers.
     *
     * @var Provider[]|string[]
     */
    public array $devProviders = [];

    /**
     * Console constructor.
     */
    public function __construct()
    {
        parent::__construct(false);

        $this->setHandlers($this->handlers);
        $this->setProviders(array_merge(Config::PROVIDERS, $this->providers));
        $this->setDevProviders(array_merge(Config::DEV_PROVIDERS, $this->devProviders));
        $this->setQuiet(false);

        $this->setFilePath(commandsPath('default.php'));
        $this->setCacheFilePath(cachePath('commands.php'));
        $this->setUseCache(false);
        $this->setUseAnnotations(false);
        $this->setUseAnnotationsExclusively(false);
    }
}
