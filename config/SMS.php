<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\SMS\Config\Config as Model;
use Valkyrja\SMS\Constants\ConfigValue;

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
        $this->username = '';
        $this->password = '';
        $this->adapter  = CKP::NEXMO;
        $this->adapters = array_merge(ConfigValue::ADAPTERS, []);
        $this->message  = CKP::DEFAULT;
        $this->messages = array_merge(ConfigValue::MESSAGES, []);

        parent::__construct([], true);
    }
}
