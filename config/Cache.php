<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Cache\Config\Config as Model;
use Valkyrja\Config\Constants\ConfigKeyPart as CKP;

/**
 * Class Cache.
 */
class Cache extends Model
{
    /**
     * Cache constructor.
     */
    public function __construct()
    {
        $this->default = CKP::REDIS;
        $this->stores  = [];

        parent::__construct([], false);
    }
}
