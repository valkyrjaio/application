<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\Config\Constants\EnvKey;
use Valkyrja\SMS\Adapters\LogAdapter;
use Valkyrja\SMS\Adapters\NexmoAdapter;
use Valkyrja\SMS\Adapters\NullAdapter;
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
        $this->adapter  = CKP::NEXMO;
        $this->adapters = [
            CKP::LOG   => [
                CKP::DRIVER  => env(EnvKey::SMS_LOG_DRIVER, LogAdapter::class),
                // null will use default adapter as set in log config
                CKP::ADAPTER => env(EnvKey::SMS_LOG_ADAPTER, null),
            ],
            CKP::NEXMO => [
                CKP::DRIVER   => env(EnvKey::SMS_NEXMO_DRIVER, NexmoAdapter::class),
                CKP::USERNAME => env(EnvKey::SMS_NEXMO_USERNAME, ''),
                CKP::PASSWORD => env(EnvKey::SMS_NEXMO_PASSWORD, ''),
            ],
            CKP::NULL  => [
                CKP::DRIVER => env(EnvKey::SMS_NULL_DRIVER, NullAdapter::class),
            ],
        ];
        $this->message  = CKP::DEFAULT;
        $this->messages = array_merge(ConfigValue::MESSAGES, []);

        parent::__construct([], true);
    }
}
