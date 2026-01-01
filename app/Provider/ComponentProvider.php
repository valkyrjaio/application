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

use App\Cli;
use App\Http;
use Valkyrja\Application\Provider\Provider as AppComponent;

/**
 * Final Class Component.
 */
class ComponentProvider extends AppComponent
{
    public static function getContainerProviders(): array
    {
        return [
            AppServiceProvider::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getCliControllers(): array
    {
        return [
            Cli\Controller\TestCommand::class,
        ];
    }

    public static function getHttpControllers(): array
    {
        return [
            Http\Controller\HomeController::class,
        ];
    }
}
