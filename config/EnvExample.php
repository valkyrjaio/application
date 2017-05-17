<?php

namespace config;

use Valkyrja\Config\Env as ValkyrjaEnv;

/**
 * Class EnvExample.
 */
class Env extends ValkyrjaEnv
{
    public const APP_ENV      = 'production';
    public const APP_DEBUG    = false;
    public const APP_URL      = 'localhost';
    public const APP_TIMEZONE = 'UTC';
    public const APP_VERSION  = '1 (ALPHA)';

    public const CONSOLE_USE_CACHE_FILE = true;

    public const CONTAINER_USE_CACHE_FILE = true;

    public const EVENTS_USE_CACHE_FILE = true;

    public const ROUTING_USE_CACHE_FILE = true;
}
