<?php

namespace config\sub;

use Valkyrja\Config\Sub\RoutingConfig as ValkyrjaRoutingConfig;
use Valkyrja\Contracts\Config\Env;

use App\Controllers\HomeController;

/**
 * Class RoutingConfig.
 */
class RoutingConfig extends ValkyrjaRoutingConfig
{
    /**
     * RoutingConfig constructor.
     *
     * @param \Valkyrja\Contracts\Config\Env $env
     */
    public function __construct(Env $env)
    {
        parent::__construct($env);

        $this->controllers = [
            HomeController::class,
        ];
    }
}
