<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Application\Application;
use Valkyrja\Application\Config\Config as Model;
use Valkyrja\Container\Constants\Provider;

/**
 * Class App.
 */
class App extends Model
{
    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->env              = 'production';
        $this->debug            = false;
        $this->url              = 'localhost';
        $this->timezone         = 'UTC';
        $this->version          = Application::VERSION;
        $this->key              = 'some_secret_app_key';
        $this->container        = Provider::CONTAINER;
        $this->dispatcher       = Provider::DISPATCHER;
        $this->events           = Provider::EVENTS;
        $this->exceptionHandler = Provider::EXCEPTION_HANDLER;

        parent::__construct([], true);
    }
}
