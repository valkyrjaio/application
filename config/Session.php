<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Session\Config\Config as Model;

/**
 * Class Session.
 */
class Session extends Model
{
    /**
     * Session constructor.
     */
    public function __construct()
    {
        $this->id   = null;
        $this->name = 'VALKYRJA_SESSION';

        parent::__construct([], true);
    }
}
