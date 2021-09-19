<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\Config\Constants\EnvKey;
use Valkyrja\Log\Config\Config as Model;

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
        $this->loggers = [
            CKP::PSR => [
                CKP::ADAPTER   => null,
                CKP::DRIVER    => null,
                CKP::NAME      => env(EnvKey::LOG_NAME, 'application-log'),
                CKP::FILE_PATH => env(EnvKey::LOG_FILE_PATH, storagePath('logs')),
            ],
        ];

        parent::__construct(null, true);
    }
}
