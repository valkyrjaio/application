<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Config\Config as Model;

use function Valkyrja\cachePath;

/**
 * Class Config.
 */
class Config extends Model
{
    /**
     *  constructor.
     */
    public function __construct()
    {
        $this->annotation = new Annotation();
        $this->api        = new Api();
        $this->app        = new App();
        $this->auth       = new Auth();
        $this->cache      = new Cache();
        $this->client     = new Client();
        $this->console    = new Console();
        $this->container  = new Container();
        $this->crypt      = new Crypt();
        $this->event      = new Event();
        $this->filesystem = new Filesystem();
        $this->log        = new Log();
        $this->mail       = new Mail();
        $this->orm        = new ORM();
        $this->path       = new Path();
        $this->routing    = new Routing();
        $this->session    = new Session();
        $this->sms        = new SMS();
        $this->validation = new Validation();
        $this->view       = new View();

        $this->providers     = [];
        $this->cacheFilePath = cachePath('config.php');
        $this->useCache      = false;

        parent::__construct([], true);
    }
}
