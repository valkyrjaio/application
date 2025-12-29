<?php

namespace App\Entry;

use App\Config\AppConfig;
use App\Throwable\Handler\ThrowableHandler;
use Valkyrja\Application\Data\Config;
use Valkyrja\Application\Entry\App as Valkyrja;
use Valkyrja\Throwable\Handler\Contract\ThrowableHandler as ErrorHandlerContract;

/**
 * Class App.
 */
class App extends Valkyrja
{
    /**
     * @inheritDoc
     */
    protected static function getConfig(): Config
    {
        return new AppConfig();
    }

    /**
     * @inheritDoc
     */
    protected static function defaultExceptionHandler(): void
    {
        ThrowableHandler::enable(
            displayErrors: true
        );
    }

    /**
     * @inheritDoc
     */
    protected static function getThrowableHandler(): ErrorHandlerContract
    {
        return new ThrowableHandler();
    }
}
