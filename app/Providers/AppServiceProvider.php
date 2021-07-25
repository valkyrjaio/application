<?php

namespace App\Providers;

use Valkyrja\Container\Container;
use Valkyrja\Container\Support\Provider;
use Valkyrja\Event\Events;
use Valkyrja\HttpKernel\Kernel;
use Valkyrja\Routing\Router;

/**
 * Class AppServiceProvider.
 */
class AppServiceProvider extends Provider
{
    /**
     * @inheritDoc
     */
    public static function publishers(): array
    {
        return [
            Kernel::class => 'publishKernel',
        ];
    }

    /**
     * @inheritDoc
     */
    public static function provides(): array
    {
        return [
            Kernel::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function publish(Container $container): void
    {
        //
    }

    /**
     * Publish the kernel service.
     *
     * @param Container $container The container
     *
     * @return void
     */
    public static function publishKernel(Container $container): void
    {
        $config = $container->getSingleton('config');

        $container->setSingleton(
            Kernel::class,
            new \App\Http\Kernel(
                $container,
                $container->getSingleton(Events::class),
                $container->getSingleton(Router::class),
                $config['routing'],
                $config['app']['debug']
            )
        );
    }
}
