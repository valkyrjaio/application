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
        $this->drivers  = array_merge(ConfigValue::DRIVERS, []);
        $this->sessions = [
            CKP::DEFAULT => [
                CKP::ADAPTER       => env(EnvKey::SESSION_ADAPTER, CKP::PHP),
                CKP::DRIVER        => env(EnvKey::SESSION_DRIVER, CKP::DEFAULT),
                CKP::ID            => env(EnvKey::SESSION_ID, null),
                CKP::NAME          => env(EnvKey::SESSION_NAME, 'VALKYRJA_SESSION'),
                CKP::COOKIE_PARAMS => [
                    'lifetime' => env(EnvKey::SESSION_COOKIE_LIFETIME, 0),
                    'path'     => env(EnvKey::SESSION_COOKIE_PATH, '/'),
                    'domain'   => env(EnvKey::SESSION_COOKIE_DOMAIN, null),
                    'secure'   => env(EnvKey::SESSION_COOKIE_SECURE, false),
                    'httponly' => env(EnvKey::SESSION_COOKIE_HTTP_ONLY, false),
                    'samesite' => env(EnvKey::SESSION_COOKIE_SAME_SITE, ''),
                ],
            ],
        ];

        parent::__construct([], true);
    }
}
