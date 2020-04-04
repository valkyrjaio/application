<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\View\Config\Config as Model;
use Valkyrja\View\Enums\ConfigValue;

use function Valkyrja\resourcesPath;

/**
 * Class View.
 */
class View extends Model
{
    /**
     * View constructor.
     */
    public function __construct()
    {
        $this->dir     = resourcesPath('views');
        $this->engine  = ConfigValue::ENGINE;
        $this->engines = array_merge(ConfigValue::ENGINES, []);
        $this->paths   = [];

        parent::__construct([], false);
    }
}
