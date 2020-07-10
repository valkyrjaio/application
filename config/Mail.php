<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Mail\Config\Config as Model;

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
        $this->host        = 'smtp1.example.com;smtp2.example.com';
        $this->port        = 587;
        $this->fromAddress = 'hello@example.com';
        $this->fromName    = 'Example';
        $this->encryption  = 'tls';
        $this->username    = '';
        $this->password    = '';

        parent::__construct([], true);
    }
}
