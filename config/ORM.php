<?php

declare(strict_types=1);

namespace Config;

use Config\ORM\Connections;
use Valkyrja\Config\Enums\ConfigKeyPart as CKP;
use Valkyrja\Config\Configs\ORM as Model;
use Valkyrja\ORM\Enums\Config;
use Valkyrja\ORM\Repositories\Repository;

/**
 * Class ORM.
 */
class ORM extends Model
{
    /**
     * The adapters.
     *
     * @var string[]
     */
    public array $adapters = [];

    /**
     * ORM constructor.
     */
    public function __construct()
    {
        parent::__construct(false);

        $this->setConnection(CKP::MYSQL);
        $this->setAdapters(array_merge(Config::ADAPTERS, $this->adapters));
        $this->setRepository(Repository::class);
        $this->setConnections(new Connections());
    }
}
