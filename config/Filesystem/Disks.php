<?php

declare(strict_types=1);

namespace Config\Filesystem;

use Valkyrja\Config\Configs\Filesystem\Disks as Model;

/**
 * Class Disks.
 */
class Disks extends Model
{
    /**
     * Disks constructor.
     */
    public function __construct()
    {
        parent::__construct(false);

        $this->setLocalDisk(new Local());
        $this->setS3Disk(new S3());
    }
}
