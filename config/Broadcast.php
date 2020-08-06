<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Broadcast\Adapters\CacheAdapter;
use Valkyrja\Broadcast\Adapters\CryptPusherAdapter;
use Valkyrja\Broadcast\Adapters\LogAdapter;
use Valkyrja\Broadcast\Adapters\NullAdapter;
use Valkyrja\Broadcast\Adapters\PusherAdapter;
use Valkyrja\Broadcast\Config\Config as Model;
use Valkyrja\Broadcast\Constants\ConfigValue;
use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\Config\Constants\EnvKey;

use function Valkyrja\env;

/**
 * Class Broadcast.
 */
class Broadcast extends Model
{
    /**
     * Broadcast constructor.
     */
    public function __construct()
    {
        $this->adapter  = CKP::CRYPT;
        $this->adapters = [
            CKP::CACHE  => [
                CKP::DRIVER => env(EnvKey::BROADCAST_CACHE_DRIVER, CacheAdapter::class),
                // null will use default store as set in cache config
                CKP::STORE  => env(EnvKey::BROADCAST_CACHE_STORE, null),
            ],
            CKP::CRYPT  => [
                CKP::DRIVER => env(EnvKey::BROADCAST_CRYPT_DRIVER, CryptPusherAdapter::class),
                // null will use default adapter as set in crypt config
                CKP::ADAPTER => env(EnvKey::BROADCAST_CRYPT_ADAPTER, null),
            ],
            CKP::LOG    => [
                CKP::DRIVER => env(EnvKey::BROADCAST_LOG_DRIVER, LogAdapter::class),
                // null will use default adapter as set in log config
                CKP::ADAPTER => env(EnvKey::BROADCAST_LOG_ADAPTER, null),
            ],
            CKP::NULL   => [
                CKP::DRIVER => env(EnvKey::BROADCAST_NULL_DRIVER, NullAdapter::class),
            ],
            CKP::PUSHER => [
                CKP::DRIVER  => env(EnvKey::BROADCAST_PUSHER_DRIVER, PusherAdapter::class),
                CKP::KEY     => env(EnvKey::BROADCAST_PUSHER_KEY, ''),
                CKP::SECRET  => env(EnvKey::BROADCAST_PUSHER_SECRET, ''),
                CKP::ID      => env(EnvKey::BROADCAST_PUSHER_ID, ''),
                CKP::CLUSTER => env(EnvKey::BROADCAST_PUSHER_CLUSTER, 'us1'),
                CKP::USE_TLS => env(EnvKey::BROADCAST_PUSHER_USE_TLS, true),
            ],
        ];
        $this->message  = CKP::DEFAULT;
        $this->messages = array_merge(ConfigValue::MESSAGES, []);

        parent::__construct([], true);
    }
}
