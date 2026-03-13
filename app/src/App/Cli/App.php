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

namespace App\Cli;

use App\Cli\Provider\Data\ContainerDataProvider;
use App\Throwable\Handler\ThrowableHandler;
use Override;
use Valkyrja\Application\Entry\Cli;
use Valkyrja\Container\Manager\Contract\ContainerContract;
use Valkyrja\Throwable\Handler\Contract\ThrowableHandlerContract;

final class App extends Cli
{
    /**
     * @inheritDoc
     */
    #[Override]
    protected static function defaultExceptionHandler(): void
    {
        ThrowableHandler::enable(
            displayErrors: true
        );
    }

    /**
     * @inheritDoc
     */
    #[Override]
    protected static function getThrowableHandler(): ThrowableHandlerContract
    {
        return new ThrowableHandler();
    }

    /**
     * @inheritDoc
     */
    #[Override]
    protected static function publishContainerData(ContainerContract $container): void
    {
        ContainerDataProvider::publishData(container: $container);
    }
}
