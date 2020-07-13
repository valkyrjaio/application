<?php

declare(strict_types=1);

namespace Config;

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
        $this->adapter  = CKP::PUSHER;
        $this->adapters = array_merge(ConfigValue::ADAPTERS, []);
        $this->disks    = [
            CKP::CACHE  => [
                CKP::ADAPTER => env(EnvKey::BROADCAST_CACHE_STORE, CKP::REDIS),
            ],
            CKP::LOG    => [
                CKP::ADAPTER => env(EnvKey::BROADCAST_LOG_ADAPTER, CKP::LOCAL),
            ],
            CKP::PUSHER => [
                CKP::KEY     => env(EnvKey::BROADCAST_PUSHER_KEY, ''),
                CKP::SECRET  => env(EnvKey::BROADCAST_PUSHER_SECRET, ''),
                CKP::ID      => env(EnvKey::BROADCAST_PUSHER_ID, ''),
                CKP::CLUSTER => env(EnvKey::BROADCAST_PUSHER_CLUSTER, 'us1'),
                CKP::USE_TLS => env(EnvKey::BROADCAST_PUSHER_USE_TLS, true),
            ],
        ];

        parent::__construct([], true);
    }
}
