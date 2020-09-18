<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\Config\Constants\EnvKey;
use Valkyrja\SMS\Config\Config as Model;
use Valkyrja\SMS\Constants\ConfigValue;

use function Valkyrja\env;

/**
 * Class SMS.
 */
class SMS extends Model
{
    /**
     * SMS constructor.
     */
    public function __construct()
    {
        $this->default         = CKP::NEXMO;
        $this->adapters        = array_merge(ConfigValue::ADAPTERS, []);
        $this->drivers         = array_merge(ConfigValue::DRIVERS, []);
        $this->messengers      = [
            CKP::LOG   => [
                CKP::ADAPTER => env(EnvKey::SMS_LOG_ADAPTER, CKP::LOG),
                CKP::DRIVER  => env(EnvKey::SMS_LOG_DRIVER, CKP::DEFAULT),
                // null will use default adapter as set in log config
                CKP::LOGGER  => env(EnvKey::SMS_LOG_LOGGER, null),
            ],
            CKP::NEXMO => [
                CKP::ADAPTER  => env(EnvKey::SMS_NULL_ADAPTER, CKP::NULL),
                CKP::DRIVER   => env(EnvKey::SMS_NULL_DRIVER, CKP::DEFAULT),
                CKP::USERNAME => env(EnvKey::SMS_NEXMO_USERNAME, ''),
                CKP::PASSWORD => env(EnvKey::SMS_NEXMO_PASSWORD, ''),
            ],
            CKP::NULL  => [
                CKP::ADAPTER => env(EnvKey::SMS_NULL_ADAPTER, CKP::NULL),
                CKP::DRIVER  => env(EnvKey::SMS_NULL_DRIVER, CKP::DEFAULT),
            ],
        ];
        $this->defaultMessage  = CKP::DEFAULT;
        $this->messageAdapters = array_merge(ConfigValue::MESSAGES, []);
        $this->messages        = [
            CKP::DEFAULT => [
                CKP::ADAPTER   => CKP::DEFAULT,
                CKP::FROM_NAME => env(EnvKey::SMS_FROM_NAME, 'Example'),
            ],
        ];

        parent::__construct([], true);
    }
}
