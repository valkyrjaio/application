<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\Config\Constants\EnvKey;
use Valkyrja\View\Config\Config as Model;
use Valkyrja\View\Constants\ConfigValue;

use function Valkyrja\env;
use function Valkyrja\resourcesPath;
use function Valkyrja\storagePath;

/**
 * Class View.
 */
class View extends Model
{
    /**
     * View constructor.
     */
    public function __construct()
    {
        $this->dir     = resourcesPath('views');
        $this->engine  = ConfigValue::ENGINE;
        $this->engines = array_merge(ConfigValue::ENGINES, []);
        $this->paths   = [];
        $this->disks   = [
            CKP::PHP  => [
                CKP::FILE_EXTENSION => env(EnvKey::VIEW_PHP_FILE_EXTENSION, '.phtml'),
            ],
            CKP::TWIG => [
                CKP::COMPILED_DIR => env(EnvKey::VIEW_TWIG_COMPILED_DIR, storagePath('views')),
                CKP::EXTENSIONS   => env(EnvKey::VIEW_TWIG_EXTENSIONS, []),
            ],
        ];

        parent::__construct([], true);
    }
}
