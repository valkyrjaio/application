<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\Config\Constants\EnvKey;
use Valkyrja\Filesystem\Adapters\LocalFlysystemAdapter;
use Valkyrja\Filesystem\Adapters\S3FlysystemAdapter;
use Valkyrja\Filesystem\Config\Config as Model;

use function Valkyrja\env;
use function Valkyrja\storagePath;

/**
 * Class Filesystem.
 */
class Filesystem extends Model
{
    /**
     * Filesystem constructor.
     */
    public function __construct()
    {
        $this->default  = CKP::LOCAL;
        $this->adapters = [
            CKP::LOCAL => [
                CKP::DRIVER => env(EnvKey::FILESYSTEM_LOCAL_DRIVER, LocalFlysystemAdapter::class),
                CKP::DIR    => env(EnvKey::FILESYSTEM_LOCAL_DIR, storagePath('app')),
            ],
            CKP::S3    => [
                CKP::DRIVER  => env(EnvKey::FILESYSTEM_S3_DRIVER, S3FlysystemAdapter::class),
                CKP::KEY     => env(EnvKey::FILESYSTEM_S3_KEY),
                CKP::SECRET  => env(EnvKey::FILESYSTEM_S3_SECRET),
                CKP::REGION  => env(EnvKey::FILESYSTEM_S3_REGION, 'us1'),
                CKP::VERSION => env(EnvKey::FILESYSTEM_S3_VERSION, 'latest'),
                CKP::BUCKET  => env(EnvKey::FILESYSTEM_S3_BUCKET),
                CKP::PREFIX  => env(EnvKey::FILESYSTEM_S3_PREFIX, ''),
                CKP::OPTIONS  => env(EnvKey::FILESYSTEM_S3_OPTIONS, []),
            ],
        ];

        parent::__construct([], true);
    }
}
