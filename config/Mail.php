<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\Config\Constants\EnvKey;
use Valkyrja\Mail\Adapters\LogAdapter;
use Valkyrja\Mail\Adapters\MailgunAdapter;
use Valkyrja\Mail\Adapters\NullAdapter;
use Valkyrja\Mail\Adapters\PHPMailerAdapter;
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
        $this->fromAddress = 'hello@example.com';
        $this->fromName    = 'Example';
        $this->adapter     = CKP::PHP_MAILER;
        $this->adapters    = [
            CKP::LOG        => [
                CKP::DRIVER  => env(EnvKey::MAIL_LOG_DRIVER, LogAdapter::class),
                // null will use default adapter as set in log config
                CKP::ADAPTER => env(EnvKey::MAIL_LOG_ADAPTER, null),
            ],
            CKP::NULL       => [
                CKP::DRIVER => env(EnvKey::MAIL_NULL_DRIVER, NullAdapter::class),
            ],
            CKP::PHP_MAILER => [
                CKP::DRIVER     => env(EnvKey::MAIL_PHP_MAILER_DRIVER, PHPMailerAdapter::class),
                CKP::USERNAME   => env(EnvKey::MAIL_PHP_MAILER_USERNAME, ''),
                CKP::PASSWORD   => env(EnvKey::MAIL_PHP_MAILER_PASSWORD, ''),
                CKP::HOST       => env(EnvKey::MAIL_PHP_MAILER_HOST, 'smtp1.example.com;smtp2.example.com'),
                CKP::PORT       => env(EnvKey::MAIL_PHP_MAILER_PORT, 587),
                CKP::ENCRYPTION => env(EnvKey::MAIL_PHP_MAILER_ENCRYPTION, 'tls'),
            ],
            CKP::MAILGUN    => [
                CKP::DRIVER  => env(EnvKey::MAIL_MAILGUN_DRIVER, MailgunAdapter::class),
                CKP::DOMAIN  => env(EnvKey::MAIL_MAILGUN_DOMAIN, ''),
                CKP::API_KEY => env(EnvKey::MAIL_MAILGUN_API_KEY, ''),
            ],
        ];
        $this->message     = CKP::DEFAULT;
        $this->messages    = array_merge(ConfigValue::MESSAGES, []);

        parent::__construct([], true);
    }
}
