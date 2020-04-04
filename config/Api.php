<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Api\Enums\ConfigValue;
use Valkyrja\Api\Config\Config as Model;

/**
 * Class Api.
 */
class Api extends Model
{
    /**
     * Api constructor.
     */
    public function __construct()
    {
        $this->jsonModel     = ConfigValue::JSON_MODEL;
        $this->jsonDataModel = ConfigValue::JSON_DATA_MODEL;

        parent::__construct([], false);
    }
}
