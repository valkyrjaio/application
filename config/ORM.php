<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Constants\ConfigKeyPart as CKP;
use Valkyrja\Config\Constants\EnvKey;
use Valkyrja\ORM\Adapters\PDOAdapter;
use Valkyrja\ORM\Config\Config as Model;
use Valkyrja\ORM\Drivers\Driver;
use Valkyrja\ORM\Drivers\PgSqlDriver;
use Valkyrja\ORM\PDOs\MySqlPDO;
use Valkyrja\ORM\PDOs\PgSqlPDO;
use Valkyrja\ORM\Persisters\Persister;
use Valkyrja\ORM\Queries\Query;
use Valkyrja\ORM\QueryBuilders\SqlQueryBuilder;
use Valkyrja\ORM\Repositories\Repository;
use Valkyrja\ORM\Retrievers\Retriever;

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
        $this->default      = CKP::MYSQL;
        $this->adapter      = PDOAdapter::class;
        $this->driver       = Driver::class;
        $this->query        = Query::class;
        $this->queryBuilder = SqlQueryBuilder::class;
        $this->persister    = Persister::class;
        $this->retriever    = Retriever::class;
        $this->repository   = Repository::class;
        $this->connections  = [
            CKP::MYSQL => [
                CKP::ADAPTER       => env(EnvKey::ORM_MYSQL_ADAPTER),
                CKP::DRIVER        => env(EnvKey::ORM_MYSQL_DRIVER),
                CKP::QUERY         => env(EnvKey::ORM_MYSQL_QUERY),
                CKP::QUERY_BUILDER => env(EnvKey::ORM_MYSQL_QUERY_BUILDER),
                CKP::PERSISTER     => env(EnvKey::ORM_MYSQL_PERSISTER),
                CKP::RETRIEVER     => env(EnvKey::ORM_MYSQL_RETRIEVER),
                CKP::CONFIG        => [
                    CKP::PDO      => env(EnvKey::ORM_MYSQL_PDO, MySqlPDO::class),
                    CKP::DRIVER   => CKP::MYSQL,
                    CKP::HOST     => env(EnvKey::ORM_MYSQL_HOST, '127.0.0.1'),
                    CKP::PORT     => env(EnvKey::ORM_MYSQL_PORT, '3306'),
                    CKP::DB       => env(EnvKey::ORM_MYSQL_DB, CKP::VALHALLA),
                    CKP::USER     => env(EnvKey::ORM_MYSQL_USER, CKP::VALHALLA),
                    CKP::PASSWORD => env(EnvKey::ORM_MYSQL_PASSWORD, ''),
                    CKP::CHARSET  => env(EnvKey::ORM_MYSQL_CHARSET, 'utf8mb4'),
                    CKP::STRICT   => env(EnvKey::ORM_MYSQL_STRICT, true),
                    CKP::ENGINE   => env(EnvKey::ORM_MYSQL_ENGINE),
                    CKP::OPTIONS  => env(EnvKey::ORM_MYSQL_OPTIONS),
                ],
            ],
            CKP::PGSQL => [
                CKP::ADAPTER       => env(EnvKey::ORM_PGSQL_ADAPTER),
                CKP::DRIVER        => env(EnvKey::ORM_PGSQL_DRIVER, PgSqlDriver::class),
                CKP::QUERY         => env(EnvKey::ORM_PGSQL_QUERY),
                CKP::QUERY_BUILDER => env(EnvKey::ORM_PGSQL_QUERY_BUILDER),
                CKP::PERSISTER     => env(EnvKey::ORM_PGSQL_PERSISTER),
                CKP::RETRIEVER     => env(EnvKey::ORM_PGSQL_RETRIEVER),
                CKP::CONFIG        => [
                    CKP::PDO           => env(EnvKey::ORM_PGSQL_PDO, PgSqlPDO::class),
                    CKP::DRIVER        => CKP::PGSQL,
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
            ],
        ];
        $this->migrations   = [];

        parent::__construct(null, true);
    }
}
