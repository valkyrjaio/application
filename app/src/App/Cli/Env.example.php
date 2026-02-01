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

namespace App\Cli;

use App\Cli\Provider\ComponentProvider;
use App\Env\Env as AppEnv;
use App\Http\Provider\ComponentProvider as HttpComponentProvider;
use Valkyrja\Application\Provider\Provider;

final class Env extends AppEnv
{
    /** @var class-string<Provider>[] */
    public const array APP_CUSTOM_COMPONENTS = [
        ComponentProvider::class,
        HttpComponentProvider::class,
    ];

    /************************************************************
     *
     * Container component env variables.
     *
     ************************************************************/

    /** @var non-empty-string|null */
    public const string|null CONTAINER_CACHE_FILE_PATH = 'cli/container.php';
}
