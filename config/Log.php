<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Configs\Log as Model;

use function Valkyrja\storagePath;

/**
 * Class Logging.
 */
class Log extends Model
{
    /**
     * Logging constructor.
     */
    public function __construct()
    {
        parent::__construct(false);

        $this->setName('ApplicationLog');
        $this->setFilePath(storagePath('logs'));
    }
}
