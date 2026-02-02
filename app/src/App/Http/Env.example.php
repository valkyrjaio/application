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

namespace App\Http;

use App\Env\Env as AppEnv;

final class Env extends AppEnv
{
    /************************************************************
     *
     * Container component env variables.
     *
     ************************************************************/

    /** @var non-empty-string|null */
    public const string|null CONTAINER_CACHE_FILE_PATH = 'http/container.php';

    /************************************************************
     *
     * Cli Routing component env variables.
     *
     ************************************************************/

    /** @var non-empty-string|null */
    public const string|null CLI_ROUTING_COLLECTION_FILE_PATH = 'cli/routes.php';

    /************************************************************
     *
     * Http Routing component env variables.
     *
     ************************************************************/

    /** @var non-empty-string|null */
    public const string|null HTTP_ROUTING_COLLECTION_FILE_PATH = 'http/route.php';
}
