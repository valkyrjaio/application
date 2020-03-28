<?php

declare(strict_types=1);

namespace Config\Filesystem;

use Valkyrja\Config\Configs\Filesystem\Local as Model;
use Valkyrja\Config\Enums\ConfigKeyPart as CKP;

use function Valkyrja\storagePath;

/**
 * Class Local.
 */
class Local extends Model
{
    /**
     * Local constructor.
     */
    public function __construct()
    {
        parent::__construct(false);

        $this->setAdapter(CKP::LOCAL);
        $this->setDir(storagePath('app'));
    }
}
