<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Crypt\Config\Config as Model;

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
        $this->key     = 'default_key_phrase';
        $this->keyPath = null;

        parent::__construct([], false);
    }
}
