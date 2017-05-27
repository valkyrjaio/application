<?php

namespace App\Providers;

use Valkyrja\Contracts\Application;
use Valkyrja\Support\Provider;

/**
 * Class AppServiceProvider.
 */
class AppServiceProvider extends Provider
{
    /**
     * Publish the provider.
     *
     * @param \Valkyrja\Contracts\Application $app The application
     *
     * @return void
     */
    public static function publish(Application $app): void
    {
        //
    }
}
