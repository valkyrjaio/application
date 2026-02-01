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

namespace App\Cli\Provider;

use App\Cli\Controller\TestCommand;
use Valkyrja\Application\Provider\Provider;

final class ComponentProvider extends Provider
{
    /**
     * @inheritDoc
     */
    public static function getContainerProviders(): array
    {
        return [
            ServiceProvider::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getCliControllers(): array
    {
        return [
            TestCommand::class,
        ];
    }
}
