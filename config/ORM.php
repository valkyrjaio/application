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
        $this->drivers     = array_merge(ConfigValue::DRIVERS, []);
        $this->repository  = Repository::class;
        $this->connections = [
            CKP::MYSQL => [
                CKP::ADAPTER    => env(EnvKey::ORM_MYSQL_ADAPTER, CKP::PDO),
                CKP::DRIVER     => env(EnvKey::ORM_MYSQL_DRIVER, CKP::DEFAULT),
                CKP::PDO_DRIVER => env(EnvKey::ORM_MYSQL_PDO_DRIVER, CKP::MYSQL),
                CKP::HOST       => env(EnvKey::ORM_MYSQL_HOST, '127.0.0.1'),
                CKP::PORT       => env(EnvKey::ORM_MYSQL_PORT, '3306'),
                CKP::DB         => env(EnvKey::ORM_MYSQL_DB, CKP::VALHALLA),
                CKP::USER       => env(EnvKey::ORM_MYSQL_USER, CKP::VALHALLA),
                CKP::PASSWORD   => env(EnvKey::ORM_MYSQL_PASSWORD, ''),
                CKP::CHARSET    => env(EnvKey::ORM_MYSQL_CHARSET, 'utf8mb4'),
                CKP::STRICT     => env(EnvKey::ORM_MYSQL_STRICT, true),
                CKP::ENGINE     => env(EnvKey::ORM_MYSQL_ENGINE),
                CKP::OPTIONS    => env(EnvKey::ORM_MYSQL_OPTIONS),
            ],
            CKP::PGSQL => [
                CKP::ADAPTER       => env(EnvKey::ORM_PGSQL_ADAPTER, CKP::PDO),
                CKP::DRIVER        => env(EnvKey::ORM_PGSQL_DRIVER, CKP::DEFAULT),
                CKP::PDO_DRIVER    => env(EnvKey::ORM_PGSQL_PDO_DRIVER, CKP::PGSQL),
                CKP::HOST          => env(EnvKey::ORM_PGSQL_HOST, '127.0.0.1'),
                CKP::PORT          => env(EnvKey::ORM_PGSQL_PORT, '5432'),
                CKP::DB            => env(EnvKey::ORM_PGSQL_DB, CKP::VALHALLA),
                CKP::USER          => env(EnvKey::ORM_PGSQL_USER, CKP::VALHALLA),
                CKP::PASSWORD      => env(EnvKey::ORM_PGSQL_PASSWORD, ''),
                CKP::CHARSET       => env(EnvKey::ORM_PGSQL_CHARSET, 'utf8'),
                CKP::SCHEMA        => env(EnvKey::ORM_PGSQL_SCHEMA, 'public'),
                CKP::SSL_MODE      => env(EnvKey::ORM_PGSQL_SSL_MODE, 'prefer'),
                CKP::SSL_CERT      => env(EnvKey::ORM_PGSQL_SSL_CERT),
                CKP::SSL_KEY       => env(EnvKey::ORM_PGSQL_SSL_KEY),
                CKP::SSL_ROOT_CERT => env(EnvKey::ORM_PGSQL_SSL_ROOT_CERT),
                CKP::OPTIONS       => env(EnvKey::ORM_PGSQL_OPTIONS),
            ],
        ];
        $this->migrations  = [];

        parent::__construct([], true);
    }
}
