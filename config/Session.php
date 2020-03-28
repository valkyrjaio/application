<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Configs\Session as Model;

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
        parent::__construct(false);

        $this->setId(null);
        $this->setName('SESSION_NAME');
    }
}
