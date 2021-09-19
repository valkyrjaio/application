<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Cache\Adapters\LogAdapter;
use Valkyrja\Cache\Adapters\NullAdapter;
use Valkyrja\Cache\Config\Config as Model;
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
        $this->stores = [
            CKP::REDIS => [
                CKP::ADAPTER => env(EnvKey::CACHE_REDIS_ADAPTER),
                CKP::DRIVER  => env(EnvKey::CACHE_REDIS_DRIVER),
                CKP::HOST    => env(EnvKey::CACHE_REDIS_HOST, ''),
                CKP::PORT    => env(EnvKey::CACHE_REDIS_PORT, ''),
                CKP::PREFIX  => env(EnvKey::CACHE_REDIS_PREFIX),
            ],
            CKP::NULL  => [
                CKP::ADAPTER => env(EnvKey::CACHE_NULL_ADAPTER, NullAdapter::class),
                CKP::DRIVER  => env(EnvKey::CACHE_NULL_DRIVER),
                CKP::PREFIX  => env(EnvKey::CACHE_NULL_PREFIX),
            ],
            CKP::LOG   => [
                CKP::ADAPTER => env(EnvKey::CACHE_LOG_ADAPTER, LogAdapter::class),
                CKP::DRIVER  => env(EnvKey::CACHE_LOG_DRIVER),
                // null will use default as set in log config
                CKP::LOGGER  => env(EnvKey::CACHE_LOG_LOGGER),
                CKP::PREFIX  => env(EnvKey::CACHE_LOG_PREFIX),
            ],
        ];

        parent::__construct(null, true);
    }
}
