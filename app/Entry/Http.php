<?php

declare(strict_types=1);

/*
 * This file is part of the Valkyrja Framework package.
 *
 * (c) Melech Mizrachi <melechmizrachi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Entry;

use App\Config\AppConfig;
use App\Throwable\Handler\ThrowableHandler;
use Valkyrja\Application\Data\Config;
use Valkyrja\Application\Entry\Http as Valkyrja;
use Valkyrja\Throwable\Handler\Contract\ThrowableHandlerContract;

/**
 * Class App.
 */
class Http extends Valkyrja
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
    protected static function getThrowableHandler(): ThrowableHandlerContract
    {
        return new ThrowableHandler();
    }
}
