<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Application\Application;
use Valkyrja\Config\Configs\App as Model;
use Valkyrja\Container\Enums\Provider;

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
        parent::__construct(false);

        $this->setEnv('production');
        $this->setDebug(false);
        $this->setUrl('localhost');
        $this->setTimezone('UTC');
        $this->setVersion(Application::VERSION);
        $this->setKey('some_secret_app_key');
        $this->setHttpException(Provider::HTTP_EXCEPTION);
        $this->setContainer(Provider::CONTAINER);
        $this->setDispatcher(Provider::DISPATCHER);
        $this->setEvents(Provider::EVENTS);
        $this->setExceptionHandler(Provider::EXCEPTION_HANDLER);
    }
}
