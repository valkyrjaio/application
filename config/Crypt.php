<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\Config\Constants\EnvKey;
use Valkyrja\Crypt\Config\Config as Model;
use Valkyrja\Crypt\Constants\ConfigValue;

use function Valkyrja\env;

/**
 * Class Crypt.
 */
class Crypt extends Model
{
    /**
     * Crypt constructor.
     */
    public function __construct()
    {
        $this->default = CKP::SODIUM;
        $this->adapter = ConfigValue::ADAPTER;
        $this->driver  = ConfigValue::DRIVER;
        $this->crypts  = [
            CKP::SODIUM => [
                CKP::ADAPTER  => env(EnvKey::CRYPT_DEFAULT_ADAPTER),
                CKP::DRIVER   => env(EnvKey::CRYPT_DEFAULT_DRIVER),
                CKP::KEY      => env(EnvKey::CRYPT_KEY, env(EnvKey::APP_KEY)),
                CKP::KEY_PATH => env(EnvKey::CRYPT_KEY_PATH),
            ],
        ];

        parent::__construct([], true);
    }
}
