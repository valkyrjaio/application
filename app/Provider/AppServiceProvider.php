<?php

declare(strict_types=1);

namespace App\Provider;

use App\Cli\Controller\TestCommand;
use App\Http\Controller\HomeController;
use Valkyrja\Cli\Interaction\Factory\Contract\OutputFactory;
use Valkyrja\Cli\Interaction\Input\Contract\Input;
use Valkyrja\Container\Manager\Contract\Container;
use Valkyrja\Container\Provider\Provider;
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
