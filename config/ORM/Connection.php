<?php

declare(strict_types=1);

namespace Config\ORM;

use Valkyrja\Config\Enums\ConfigKeyPart as CKP;
use Valkyrja\Config\Configs\ORM\Connection as Model;

/**
 * Class Connection.
 */
class Connection extends Model
{
    /**
     * Connection constructor.
     *
     * @param string|null $driver
     * @param string|null $adapter
     */
    public function __construct(string $driver = null, string $adapter = null)
    {
        parent::__construct($driver, $adapter, false);

        $this->setDriver($driver ?? CKP::MYSQL);
        $this->setAdapter($adapter ?? CKP::PDO);
        $this->setHost('127.0.0.1');
        $this->setPort('3306');
        $this->setDb(CKP::VALHALLA);
        $this->setUsername(CKP::VALHALLA);
        $this->setPassword('');
        $this->setSocket('');
        $this->setCharset('utf8mb4');
        $this->setCollation('utf8mb4_unicode_ci');
        $this->setPrefix('');
        $this->setStrict(true);
        $this->setEngine('');
        $this->setSchema('public');
        $this->setSslMode('prefer');
    }
}
