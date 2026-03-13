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

namespace App\Cli\Provider\Data;

use Valkyrja\Cli\Routing\Data\Data;
use Valkyrja\Cli\Routing\Provider\ServiceProvider;
use Valkyrja\Container\Manager\Contract\ContainerContract;
use Valkyrja\Container\Provider\Provider;

final class CliRoutingDataProvider extends Provider
{
    /**
     * @inheritDoc
     */
    public static function publishers(): array
    {
        return [
            Data::class => [self::class, 'publishData'],
        ];
    }

    /**
     * @inheritDoc
     */
    public static function provides(): array
    {
        return [
            Data::class,
        ];
    }

    /**
     * Publish the data.
     */
    public static function publishData(ContainerContract $container): void
    {
        ServiceProvider::publishData($container);
    }
}
