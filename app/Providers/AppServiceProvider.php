<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\Controllers\HomeController;
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
            HomeController::class => [self::class, 'publishHomeController'],
        ];
    }

    /**
     * @inheritDoc
     */
    public static function provides(): array
    {
        return [
            HomeController::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function publish(Container $container): void
    {
        //
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
