<?php

namespace config\sub;

use Valkyrja\Config\Sub\SessionConfig as ValkyrjaSessionConfig;
use Valkyrja\Contracts\Config\Env;

/**
 * Class SessionConfig.
 */
class SessionConfig extends ValkyrjaSessionConfig
{
    /**
     * SessionConfig constructor.
     *
     * @param \Valkyrja\Contracts\Config\Env $env
     */
    public function __construct(Env $env)
    {
        parent::__construct($env);
    }
}
