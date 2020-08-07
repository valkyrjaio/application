<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\Config\Constants\EnvKey;
use Valkyrja\ORM\Config\Config as Model;
use Valkyrja\ORM\Constants\ConfigValue;
use Valkyrja\ORM\Repositories\Repository;

use function Valkyrja\env;

/**
 * Class ORM.
 */
class ORM extends Model
{
    /**
     * ORM constructor.
     */
    public function __construct()
    {
        $this->default     = CKP::MYSQL;
        $this->adapters    = array_merge(ConfigValue::ADAPTERS, []);
        $this->repository  = Repository::class;
        $this->connections = [
            CKP::MYSQL => [
                CKP::ADAPTER  => env(EnvKey::ORM_MYSQL_ADAPTER, CKP::PDO),
                CKP::DRIVER   => env(EnvKey::ORM_MYSQL_DRIVER, CKP::MYSQL),
                CKP::HOST     => env(EnvKey::ORM_MYSQL_HOST, '127.0.0.1'),
                CKP::PORT     => env(EnvKey::ORM_MYSQL_PORT, '3306'),
                CKP::DB       => env(EnvKey::ORM_MYSQL_DB, CKP::VALHALLA),
                CKP::USERNAME => env(EnvKey::ORM_MYSQL_USERNAME, CKP::VALHALLA),
                CKP::PASSWORD => env(EnvKey::ORM_MYSQL_PASSWORD, ''),
                CKP::CHARSET  => env(EnvKey::ORM_MYSQL_CHARSET, 'utf8mb4'),
            ],
        ];

        parent::__construct([], true);
    }
}
