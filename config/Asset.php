<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\Config\Constants\EnvKey;
use Valkyrja\Asset\Config\Config as Model;
use Valkyrja\Asset\Constants\ConfigValue;

use function Valkyrja\env;

/**
 * Class Asset.
 */
class Asset extends Model
{
    /**
     * Asset constructor.
     */
    public function __construct()
    {
        $this->default  = CKP::DEFAULT;
        $this->adapters = array_merge(ConfigValue::ADAPTERS, []);
        $this->bundles  = [
            CKP::DEFAULT => [
                CKP::ADAPTER  => CKP::DEFAULT,
                CKP::HOST     => env(EnvKey::ASSET_DEFAULT_HOST, ''),
                CKP::PATH     => env(EnvKey::ASSET_DEFAULT_PATH, '/'),
                CKP::MANIFEST => env(EnvKey::ASSET_DEFAULT_MANIFEST, '/rev-manifest.json'),
            ],
        ];

        parent::__construct([], true);
    }
}
