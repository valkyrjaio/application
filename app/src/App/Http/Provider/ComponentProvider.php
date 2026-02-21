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

namespace App\Http\Provider;

use Valkyrja\Application\Kernel\Contract\ApplicationContract;
use Valkyrja\Application\Provider\Provider;

final class ComponentProvider extends Provider
{
    /**
     * @inheritDoc
     */
    public static function getContainerProviders(ApplicationContract $app): array
    {
        return [
            ServiceProvider::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getHttpProviders(ApplicationContract $app): array
    {
        return [
            RouteProvider::class,
        ];
    }
}
