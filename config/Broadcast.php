<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Broadcast\Adapters\CryptPusherAdapter;
use Valkyrja\Broadcast\Adapters\LogAdapter;
use Valkyrja\Broadcast\Adapters\NullAdapter;
use Valkyrja\Broadcast\Config\Config as Model;
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
        $this->broadcasters = [
            CKP::LOG    => [
                CKP::ADAPTER => env(EnvKey::BROADCAST_LOG_ADAPTER, LogAdapter::class),
                CKP::DRIVER  => env(EnvKey::BROADCAST_LOG_DRIVER),
                // null will use default adapter as set in log config
                CKP::LOGGER  => env(EnvKey::BROADCAST_LOG_LOGGER),
            ],
            CKP::NULL   => [
                CKP::ADAPTER => env(EnvKey::BROADCAST_NULL_ADAPTER, NullAdapter::class),
                CKP::DRIVER  => env(EnvKey::BROADCAST_NULL_DRIVER),
            ],
            CKP::PUSHER => [
                CKP::ADAPTER => env(EnvKey::BROADCAST_PUSHER_DRIVER, CryptPusherAdapter::class),
                CKP::DRIVER  => env(EnvKey::BROADCAST_PUSHER_DRIVER),
                CKP::KEY     => env(EnvKey::BROADCAST_PUSHER_KEY, ''),
                CKP::SECRET  => env(EnvKey::BROADCAST_PUSHER_SECRET, ''),
                CKP::ID      => env(EnvKey::BROADCAST_PUSHER_ID, ''),
                CKP::CLUSTER => env(EnvKey::BROADCAST_PUSHER_CLUSTER, 'us1'),
                CKP::USE_TLS => env(EnvKey::BROADCAST_PUSHER_USE_TLS, true),
            ],
        ];
        $this->messages     = [
            CKP::DEFAULT => null,
        ];

        parent::__construct(null, true);
    }
}
