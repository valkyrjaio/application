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

namespace App\Provider;

use App\Cli\Controller\TestCommand;
use App\Http\Controller\HomeController;
use Valkyrja\Cli\Interaction\Input\Contract\InputContract;
use Valkyrja\Cli\Interaction\Output\Factory\Contract\OutputFactoryContract;
use Valkyrja\Container\Manager\Contract\ContainerContract;
use Valkyrja\Container\Provider\Provider;
use Valkyrja\Http\Message\Request\Contract\ServerRequestContract;
use Valkyrja\Http\Message\Response\Factory\Contract\ResponseFactoryContract;

/**
 * Class AppServiceProvider.
 */
final class AppServiceProvider extends Provider
{
    /**
     * @inheritDoc
     */
    public static function publishers(): array
    {
        return [
            TestCommand::class    => [self::class, 'publishTestCommand'],
            HomeController::class => [self::class, 'publishHomeController'],
        ];
    }

    /**
     * @inheritDoc
     */
    public static function provides(): array
    {
        return [
            TestCommand::class,
            HomeController::class,
        ];
    }

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

    public static function publishHomeController(ContainerContract $container): void
    {
        $container->setSingleton(
            HomeController::class,
            new HomeController(
                $container->getSingleton(ServerRequestContract::class),
                $container->getSingleton(ResponseFactoryContract::class)
            )
        );
    }
}
