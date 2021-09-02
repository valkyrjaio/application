<?php

namespace App\Providers;

use Valkyrja\Container\Container;
use Valkyrja\Container\Support\Provider;

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
        return [];
    }

    /**
     * @inheritDoc
     */
    public static function provides(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public static function publish(Container $container): void
    {
        //
    }
}
