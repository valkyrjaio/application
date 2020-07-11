<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\Mail\Config\Config as Model;
use Valkyrja\Mail\Constants\ConfigValue;

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
        $this->message     = CKP::PHP_MAILER;
        $this->messages    = array_merge(ConfigValue::MESSAGES, []);

        parent::__construct([], true);
    }
}
