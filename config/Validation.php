<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Validation\Config\Config as Model;

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
        $this->rulesMap = array_merge($this->rulesMap, []);

        parent::__construct(null, true);
    }
}
