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
        $this->connection  = CKP::MYSQL;
        $this->adapters    = array_merge(ConfigValue::ADAPTERS, []);
        $this->repository  = Repository::class;
        $this->connections = [
            CKP::MYSQL => [
                CKP::DRIVER      => CKP::MYSQL,
                CKP::HOST        => env(EnvKey::DB_HOST, '127.0.0.1'),
                CKP::PORT        => env(EnvKey::DB_PORT, '3306'),
                CKP::DB          => env(EnvKey::DB_DATABASE, CKP::VALHALLA),
                CKP::USERNAME    => env(EnvKey::DB_USERNAME, CKP::VALHALLA),
                CKP::PASSWORD    => env(EnvKey::DB_PASSWORD, ''),
                CKP::UNIX_SOCKET => env(EnvKey::DB_SOCKET, ''),
                CKP::CHARSET     => env(EnvKey::DB_CHARSET, 'utf8mb4'),
                CKP::COLLATION   => env(EnvKey::DB_COLLATION, 'utf8mb4_unicode_ci'),
                CKP::PREFIX      => env(EnvKey::DB_PREFIX, ''),
                CKP::STRICT      => env(EnvKey::DB_STRICT, true),
                CKP::ENGINE      => env(EnvKey::DB_ENGINE, null),
                CKP::ADAPTER     => env(EnvKey::DB_ADAPTER, CKP::PDO),
            ],
        ];

        parent::__construct([], false);
    }
}
