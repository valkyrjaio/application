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

namespace App\Cli\Provider;

use App\Cli\Controller\TestCommand;
use Override;
use Valkyrja\Cli\Routing\Provider\Contract\CliRouteProviderContract;

final class RouteProvider implements CliRouteProviderContract
{
    /**
     * @inheritDoc
     */
    #[Override]
    public static function getControllerClasses(): array
    {
        return [
            TestCommand::class,
        ];
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public static function getRoutes(): array
    {
        return [];
    }
}
