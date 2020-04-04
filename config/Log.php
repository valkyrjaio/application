<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Log\Config\Config as Model;

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
        $this->name     = 'ApplicationLog';
        $this->filePath = storagePath('logs');

        parent::__construct([], false);
    }
}
