<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Enums\ConfigKeyPart as CKP;
use Valkyrja\Filesystem\Config\Config as Model;
use Valkyrja\Filesystem\Enums\ConfigValue;

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
        $this->adapters = array_merge(ConfigValue::ADAPTERS, []);
        $this->disks    = [
            CKP::LOCAL => [
                CKP::DIR     => env(EnvKey::FILESYSTEM_LOCAL_DIR, storagePath('app')),
                CKP::ADAPTER => env(EnvKey::FILESYSTEM_LOCAL_ADAPTER, CKP::LOCAL),
            ],
            CKP::S3    => [
                CKP::KEY     => env(EnvKey::FILESYSTEM_S3_KEY),
                CKP::SECRET  => env(EnvKey::FILESYSTEM_S3_SECRET),
                CKP::REGION  => env(EnvKey::FILESYSTEM_S3_REGION),
                CKP::VERSION => env(EnvKey::FILESYSTEM_S3_VERSION),
                CKP::BUCKET  => env(EnvKey::FILESYSTEM_S3_BUCKET),
                CKP::DIR     => env(EnvKey::FILESYSTEM_S3_DIR, '/'),
                CKP::OPTIONS => env(EnvKey::FILESYSTEM_S3_OPTIONS, []),
                CKP::ADAPTER => env(EnvKey::FILESYSTEM_S3_ADAPTER, CKP::S3),
            ],
        ];

        parent::__construct([], false);
    }
}
