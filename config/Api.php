<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Api\Config\Config as Model;
use Valkyrja\Api\Constants\ConfigValue;

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

        parent::__construct([], true);
    }
}
