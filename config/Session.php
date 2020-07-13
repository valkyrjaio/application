<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\Session\Config\Config as Model;
use Valkyrja\Session\Constants\ConfigValue;

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
        $this->id       = null;
        $this->name     = 'VALKYRJA_SESSION';
        $this->adapter  = CKP::PHP;
        $this->adapters = array_merge(ConfigValue::ADAPTERS, []);

        parent::__construct([], true);
    }
}
