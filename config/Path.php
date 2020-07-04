<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Path\Config\Config as Model;
use Valkyrja\Path\Constants\ConfigValue;

/**
 * Class Path.
 */
class Path extends Model
{
    /**
     * Path constructor.
     */
    public function __construct()
    {
        $this->patterns = array_merge(ConfigValue::PATTERNS, []);

        parent::__construct([], false);
    }
}
