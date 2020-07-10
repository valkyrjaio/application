<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Validation\Config\Config as Model;
use Valkyrja\Validation\Constants\ConfigValue;

/**
 * Class Validation.
 */
class Validation extends Model
{
    /**
     * Validation constructor.
     */
    public function __construct()
    {
        $this->rule  = ConfigValue::RULE;
        $this->rules = array_merge(ConfigValue::RULES, []);

        parent::__construct([], true);
    }
}
