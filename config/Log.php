<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\Log\Config\Config as Model;
use Valkyrja\Log\Constants\ConfigValue;

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
        $this->name     = 'ApplicationLog';
        $this->filePath = storagePath('logs');
        $this->adapter  = CKP::PSR;
        $this->adapters = array_merge(ConfigValue::ADAPTERS, []);

        parent::__construct([], true);
    }
}
