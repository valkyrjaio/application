<?php

declare(strict_types=1);

namespace App\Providers;

use Valkyrja\Container\Contract\Container;
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
