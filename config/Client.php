<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\Client\Config\Config as Model;
use Valkyrja\Client\Constants\ConfigValue;

/**
 * Class Client.
 */
class Client extends Model
{
    /**
     * Client constructor.
     */
    public function __construct()
    {
        $this->adapter  = CKP::GUZZLE;
        $this->adapters = array_merge(ConfigValue::ADAPTERS, []);

        parent::__construct([], true);
    }
}
