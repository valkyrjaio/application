<?php

declare(strict_types=1);

namespace Config\Filesystem;

use Valkyrja\Config\Configs\Filesystem\S3 as Model;
use Valkyrja\Config\Enums\ConfigKeyPart as CKP;

/**
 * Class S3.
 */
class S3 extends Model
{
    /**
     * S3 constructor.
     */
    public function __construct()
    {
        parent::__construct(false);

        $this->setAdapter(CKP::S3);
        $this->setDir('/');
        $this->setKey('');
        $this->setSecret('');
        $this->setRegion('');
        $this->setVersion('');
        $this->setBucket('');
        $this->setOptions([]);
    }
}
