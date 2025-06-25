<?php

declare(strict_types=1);

namespace App\Providers;

use App\Cli\Controllers\TestCommand;
use App\Http\Controllers\HomeController;
use Valkyrja\Cli\Interaction\Factory\Contract\OutputFactory;
use Valkyrja\Cli\Interaction\Input\Contract\Input;
use Valkyrja\Container\Contract\Container;
use Valkyrja\Container\Support\Provider;
use Valkyrja\Http\Message\Factory\Contract\ResponseFactory;
use Valkyrja\Http\Message\Request\Contract\ServerRequest;

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

    public static function publishTestCommand(Container $container): void
    {
        $container->setSingleton(
            TestCommand::class,
            new TestCommand(
                $container->getSingleton(Input::class),
                $container->getSingleton(OutputFactory::class)
            )
        );
    }

    public static function publishHomeController(Container $container): void
    {
        $container->setSingleton(
            HomeController::class,
            new HomeController(
                $container->getSingleton(ServerRequest::class),
                $container->getSingleton(ResponseFactory::class)
            )
        );
    }
}
