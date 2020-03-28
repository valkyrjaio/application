<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Configs\Mail as Model;

/**
 * Class Mail.
 */
class Mail extends Model
{
    /**
     * Mail constructor.
     */
    public function __construct()
    {
        parent::__construct(false);

        $this->setHost('smtp1.example.com;smtp2.example.com');
        $this->setPort(587);
        $this->setFromAddress('hello@example.com');
        $this->setFromName('Example');
        $this->setEncryption('tls');
        $this->setUsername('');
        $this->setPassword('');
    }
}
