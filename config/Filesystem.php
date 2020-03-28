<?php

declare(strict_types=1);

namespace Config;

use Config\Filesystem\Disks;
use Valkyrja\Config\Configs\Filesystem as Model;
use Valkyrja\Config\Enums\ConfigKeyPart as CKP;
use Valkyrja\Filesystem\Enums\Config;

/**
 * Class Filesystem.
 */
class Filesystem extends Model
{
    /**
     * The adapters.
     *
     * @var array
     */
    public array $adapters = [];

    /**
     * Filesystem constructor.
     */
    public function __construct()
    {
        parent::__construct(false);

        $this->setDefault(CKP::LOCAL);
        $this->setAdapters(array_merge(Config::ADAPTERS, $this->adapters));
        $this->setDisks(new Disks());
    }
}
