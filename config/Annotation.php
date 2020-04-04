<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Annotation\Enums\ConfigValue;
use Valkyrja\Annotation\Config\Config as Model;

/**
 * Class Annotation.
 */
class Annotation extends Model
{
    /**
     * Annotation constructor.
     */
    public function __construct()
    {
        $this->enabled = false;
        $this->map     = array_merge(ConfigValue::MAP, []);
        $this->aliases = array_merge(ConfigValue::ALIASES, []);

        parent::__construct([], false);
    }
}
