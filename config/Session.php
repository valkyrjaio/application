<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\Config\Constants\EnvKey;
use Valkyrja\Session\Config\Config as Model;
use Valkyrja\Session\Constants\ConfigValue;

use function Valkyrja\env;

/**
 * Class Session.
 */
class Session extends Model
{
    /**
     * Session constructor.
     */
    public function __construct()
    {
        $this->default  = CKP::DEFAULT;
        $this->adapters = array_merge(ConfigValue::ADAPTERS, []);
        $this->sessions = [
            CKP::DEFAULT => [
                CKP::ADAPTER => CKP::PHP,
                CKP::ID      => env(EnvKey::SESSION_ID, null),
                CKP::NAME    => env(EnvKey::SESSION_NAME, 'VALKYRJA_SESSION'),
            ],
        ];

        parent::__construct([], true);
    }
}
