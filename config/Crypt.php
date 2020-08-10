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
        $this->default  = CKP::DEFAULT;
        $this->adapters = array_merge(ConfigValue::ADAPTERS, []);
        $this->drivers  = array_merge(ConfigValue::DRIVERS, []);
        $this->crypts   = [
            CKP::DEFAULT => [
                CKP::ADAPTER  => CKP::SODIUM,
                CKP::DRIVER   => CKP::DEFAULT,
                CKP::KEY      => env(EnvKey::CRYPT_KEY, 'some_secret_key'),
                CKP::KEY_PATH => env(EnvKey::CRYPT_KEY_PATH, null),
            ],
        ];

        parent::__construct([], true);
    }
}
