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

namespace App\Http;

use App\Throwable\Handler\ThrowableHandler;
use Valkyrja\Application\Entry\Http;
use Valkyrja\Throwable\Handler\Contract\ThrowableHandlerContract;

final class App extends Http
{
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
