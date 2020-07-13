<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\Crypt\Config\Config as Model;
use Valkyrja\Crypt\Constants\ConfigValue;

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
        $this->key      = 'default_key_phrase';
        $this->keyPath  = null;
        $this->adapter  = CKP::SODIUM;
        $this->adapters = array_merge(ConfigValue::ADAPTERS, []);

        parent::__construct([], true);
    }
}
