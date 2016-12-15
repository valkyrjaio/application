<?php

namespace config;

use Valkyrja\Config\Config as ValkyrjaConfig;
use Valkyrja\Contracts\Config\Env;

use config\sub\AppConfig;
use config\sub\RoutingConfig;
use config\sub\StorageConfig;
use config\sub\ViewsConfig;

/**
 * Class Config
 *
 * @package config
 */
class Config extends ValkyrjaConfig
{
    /**
     * Config constructor.
     *
     * @param \Valkyrja\Contracts\Config\Env $env
     */
    public function __construct(Env $env)
    {
        parent::__construct($env);

        $this->app = new AppConfig($env);
        $this->routing = new RoutingConfig($env);
        $this->storage = new StorageConfig($env);
        $this->views = new ViewsConfig($env);
    }
}
