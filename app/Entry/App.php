<?php

namespace App\Entry;

use App\Config\AppConfig;
use App\Exception\ExceptionHandler;
use Valkyrja\Application\Data\Config;
use Valkyrja\Application\Entry\App as Valkyrja;
use Valkyrja\Exception\Contract\ExceptionHandler as ErrorHandlerContract;

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
        ExceptionHandler::enable(
            displayErrors: true
        );
    }

    /**
     * @inheritDoc
     */
    protected static function getExceptionHandler(): ErrorHandlerContract
    {
        return new ExceptionHandler();
    }
}
