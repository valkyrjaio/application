<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\Config\Constants\EnvKey;
use Valkyrja\Log\Config\Config as Model;
use Valkyrja\Log\Constants\ConfigValue;

use function Valkyrja\env;
use function Valkyrja\storagePath;

/**
 * Class Log.
 */
class Log extends Model
{
    /**
     * Log constructor.
     */
    public function __construct()
    {
        $this->default  = CKP::PSR;
        $this->adapters = array_merge(ConfigValue::ADAPTERS, []);
        $this->drivers  = array_merge(ConfigValue::DRIVERS, []);
        $this->loggers  = [
            CKP::PSR => [
                CKP::ADAPTER   => CKP::PSR,
                CKP::DRIVER    => CKP::DEFAULT,
                CKP::NAME      => env(EnvKey::LOG_NAME, 'application-log'),
                CKP::FILE_PATH => env(EnvKey::LOG_FILE_PATH, storagePath('logs')),
            ],
        ];

        parent::__construct([], true);
    }
}
