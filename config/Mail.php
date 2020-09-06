<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\Config\Constants\EnvKey;
use Valkyrja\Mail\Config\Config as Model;
use Valkyrja\Mail\Constants\ConfigValue;

use function Valkyrja\env;

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
        $this->default         = CKP::PHP_MAILER;
        $this->adapters        = array_merge(ConfigValue::ADAPTERS, []);
        $this->drivers         = array_merge(ConfigValue::DRIVERS, []);
        $this->mailers         = [
            CKP::LOG        => [
                CKP::ADAPTER => env(EnvKey::MAIL_LOG_ADAPTER, CKP::LOG),
                CKP::DRIVER  => env(EnvKey::MAIL_LOG_DRIVER, CKP::DEFAULT),
                // null will use default adapter as set in log config
                CKP::LOGGER  => env(EnvKey::MAIL_LOG_LOGGER, null),
            ],
            CKP::NULL       => [
                CKP::ADAPTER => env(EnvKey::MAIL_NULL_ADAPTER, CKP::NULL),
                CKP::DRIVER  => env(EnvKey::MAIL_NULL_DRIVER, CKP::DEFAULT),
            ],
            CKP::PHP_MAILER => [
                CKP::ADAPTER    => env(EnvKey::MAIL_PHP_MAILER_ADAPTER, CKP::PHP_MAILER),
                CKP::DRIVER     => env(EnvKey::MAIL_PHP_MAILER_DRIVER, CKP::DEFAULT),
                CKP::USERNAME   => env(EnvKey::MAIL_PHP_MAILER_USERNAME, ''),
                CKP::PASSWORD   => env(EnvKey::MAIL_PHP_MAILER_PASSWORD, ''),
                CKP::HOST       => env(EnvKey::MAIL_PHP_MAILER_HOST, 'smtp1.example.com;smtp2.example.com'),
                CKP::PORT       => env(EnvKey::MAIL_PHP_MAILER_PORT, 587),
                CKP::ENCRYPTION => env(EnvKey::MAIL_PHP_MAILER_ENCRYPTION, 'tls'),
            ],
            CKP::MAILGUN    => [
                CKP::ADAPTER => env(EnvKey::MAIL_MAILGUN_ADAPTER, CKP::MAILGUN),
                CKP::DRIVER  => env(EnvKey::MAIL_MAILGUN_DRIVER, CKP::DEFAULT),
                CKP::DOMAIN  => env(EnvKey::MAIL_MAILGUN_DOMAIN, ''),
                CKP::API_KEY => env(EnvKey::MAIL_MAILGUN_API_KEY, ''),
            ],
        ];
        $this->defaultMessage  = CKP::DEFAULT;
        $this->messageAdapters = array_merge(ConfigValue::MESSAGES, []);
        $this->messages        = [
            CKP::DEFAULT => [
                CKP::ADAPTER      => CKP::DEFAULT,
                CKP::FROM_ADDRESS => env(EnvKey::MAIL_FROM_ADDRESS, 'hello@example.com'),
                CKP::FROM_NAME    => env(EnvKey::MAIL_FROM_NAME, 'Example'),
            ],
        ];

        parent::__construct([], true);
    }
}
