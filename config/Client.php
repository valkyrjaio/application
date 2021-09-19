<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Client\Config\Config as Model;

/**
 * Class Client.
 */
class Client extends Model
{
    /**
     * Client constructor.
     */
    public function __construct()
    {
        parent::__construct(null, true);
    }
}
