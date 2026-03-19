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

use App\Cli\Provider\Data\CliRoutingData;
use App\Cli\Provider\Data\ContainerData;
use App\Cli\Provider\Data\EventData;
use App\Cli\Provider\Data\HttpRoutingData;
use Override;
use Valkyrja\Cli\Routing\Data\Data as ValkyrjaCliRoutingData;
use Valkyrja\Container\Data\Data;
use Valkyrja\Container\Manager\Contract\ContainerContract;
use Valkyrja\Container\Provider\Abstract\Provider;
use Valkyrja\Event\Data\Data as ValkyrjaEventData;
use Valkyrja\Http\Routing\Data\Data as ValkyrjaHttpRoutingData;

final class DataProvider extends Provider
{
    /**
     * @inheritDoc
     */
    #[Override]
    public static function publishers(): array
    {
        return [
            Data::class                    => [self::class, 'publishContainerData'],
            ValkyrjaEventData::class       => [self::class, 'publishEventData'],
            ValkyrjaCliRoutingData::class  => [self::class, 'publishCliRoutingData'],
            ValkyrjaHttpRoutingData::class => [self::class, 'publishHttpRoutingData'],
        ];
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public static function provides(): array
    {
        return [
            Data::class,
            ValkyrjaEventData::class,
            ValkyrjaCliRoutingData::class,
            ValkyrjaHttpRoutingData::class,
        ];
    }

    /**
     * Publish the container data.
     */
    public static function publishContainerData(ContainerContract $container): void
    {
        $container->setSingleton(Data::class, new ContainerData());
    }

    /**
     * Publish the event data.
     */
    public static function publishEventData(ContainerContract $container): void
    {
        $container->setSingleton(ValkyrjaEventData::class, new EventData());
    }

    /**
     * Publish the cli routing data.
     */
    public static function publishCliRoutingData(ContainerContract $container): void
    {
        $container->setSingleton(ValkyrjaCliRoutingData::class, new CliRoutingData());
    }

    /**
     * Publish the http routing data.
     */
    public static function publishHttpRoutingData(ContainerContract $container): void
    {
        $container->setSingleton(ValkyrjaHttpRoutingData::class, new HttpRoutingData());
    }
}
