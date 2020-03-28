<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Configs\Crypt as Model;

/**
 * Class Crypt.
 */
class Crypt extends Model
{
    /**
     * Crypt constructor.
     */
    public function __construct()
    {
        parent::__construct(false);

        $this->setKey('default_key_phrase');
        $this->setKeyPath(null);
    }
}
