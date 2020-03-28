<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Api\Enums\ConfigValue;
use Valkyrja\Config\Configs\Api as Model;

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
        parent::__construct(false);

        $this->setJsonModel(ConfigValue::JSON_MODEL);
        $this->setJsonDataModel(ConfigValue::JSON_DATA_MODEL);
    }
}
