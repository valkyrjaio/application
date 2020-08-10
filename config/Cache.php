<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Cache\Config\Config as Model;
use Valkyrja\Cache\Constants\ConfigValue;
use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\Config\Constants\EnvKey;

use function Valkyrja\env;

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
        $this->default  = CKP::REDIS;
        $this->adapters = array_merge(ConfigValue::ADAPTERS, []);
        $this->drivers  = array_merge(ConfigValue::DRIVERS, []);
        $this->stores   = [
            CKP::REDIS => [
                CKP::ADAPTER => env(EnvKey::CACHE_REDIS_ADAPTER, CKP::REDIS),
                CKP::DRIVER  => env(EnvKey::CACHE_REDIS_DRIVER, CKP::DEFAULT),
                CKP::HOST    => env(EnvKey::CACHE_REDIS_HOST, ''),
                CKP::PORT    => env(EnvKey::CACHE_REDIS_PORT, ''),
                CKP::PREFIX  => env(EnvKey::CACHE_REDIS_PREFIX, null),
            ],
            CKP::NULL  => [
                CKP::ADAPTER => env(EnvKey::CACHE_NULL_ADAPTER, CKP::NULL),
                CKP::DRIVER  => env(EnvKey::CACHE_NULL_DRIVER, CKP::DEFAULT),
                CKP::PREFIX  => env(EnvKey::CACHE_NULL_PREFIX, null),
            ],
            CKP::LOG   => [
                CKP::ADAPTER => env(EnvKey::CACHE_LOG_ADAPTER, CKP::LOG),
                CKP::DRIVER  => env(EnvKey::CACHE_LOG_DRIVER, CKP::DEFAULT),
                // null will use default as set in log config
                CKP::LOG     => env(EnvKey::CACHE_LOG_LOG, null),
                CKP::PREFIX  => env(EnvKey::CACHE_LOG_PREFIX, null),
            ],
        ];

        parent::__construct([], true);
    }
}
