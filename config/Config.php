<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Config as Model;
use Valkyrja\Support\Providers\Provider;

use function Valkyrja\cachePath;

/**
 * Class .
 */
class Config extends Model
{
    /**
     * Array of config providers.
     *  NOTE: Provider::deferred() is disregarded.
     *
     * @var Provider[]|string[]
     */
    public array $providers = [];

    /**
     *  constructor.
     */
    public function __construct()
    {
        parent::__construct(false);

        $this->setAnnotation(new Annotation());
        $this->setApp(new App());
        $this->setCache(new Cache());
        $this->setConsole(new Console());
        $this->setContainer(new Container());
        $this->setCrypt(new Crypt());
        $this->setEvent(new Event());
        $this->setFilesystem(new Filesystem());
        $this->setLog(new Log());
        $this->setMail(new Mail());
        $this->setOrm(new ORM());
        $this->setPath(new Path());
        $this->setRouting(new Routing());
        $this->setSession(new Session());
        $this->setView(new View());

        $this->setProviders($this->providers);
        $this->setCacheFilePath(cachePath('config.php'));
        $this->setUseCache(false);
    }
}
