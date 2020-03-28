<?php

declare(strict_types=1);

namespace Config\ORM;

use Valkyrja\Config\Enums\ConfigKeyPart as CKP;
use Valkyrja\Config\Configs\ORM\Connections as Model;

/**
 * Class Connections.
 */
class Connections extends Model
{
    /**
     * Connections constructor.
     */
    public function __construct()
    {
        parent::__construct(false);

        $this->setMysqlConnection(new Connection());
        $this->setPgsqlConnection(new Connection(CKP::PGSQL));
        $this->setSqlsrvConnection(new Connection(CKP::SQLSRV));
    }
}
