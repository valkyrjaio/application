<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Client\Config\Config as Model;
use Valkyrja\Client\Constants\ConfigValue;
use Valkyrja\Config\Constants\ConfigKeyPart as CKP;

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
        $this->default  = CKP::DEFAULT;
        $this->adapters = array_merge(ConfigValue::ADAPTERS, []);
        $this->drivers  = array_merge(ConfigValue::DRIVERS, []);
        $this->clients  = [
            CKP::DEFAULT => [
                CKP::ADAPTER => CKP::GUZZLE,
                CKP::DRIVER  => CKP::DEFAULT,
            ],
        ];

        parent::__construct([], true);
    }
}
