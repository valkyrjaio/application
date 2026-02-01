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
use Valkyrja\Cli\Interaction\Input\Contract\InputContract;
use Valkyrja\Cli\Interaction\Output\Factory\Contract\OutputFactoryContract;
use Valkyrja\Container\Manager\Contract\ContainerContract;
use Valkyrja\Container\Provider\Provider;

final class ServiceProvider extends Provider
{
    /**
     * @inheritDoc
     */
    public static function publishers(): array
    {
        return [
            TestCommand::class => [self::class, 'publishTestCommand'],
        ];
    }

    /**
     * @inheritDoc
     */
    public static function provides(): array
    {
        return [
            TestCommand::class,
        ];
    }

    /**
     * Publish the test command.
     */
    public static function publishTestCommand(ContainerContract $container): void
    {
        $container->setSingleton(
            TestCommand::class,
            new TestCommand(
                $container->getSingleton(InputContract::class),
                $container->getSingleton(OutputFactoryContract::class)
            )
        );
    }
}
