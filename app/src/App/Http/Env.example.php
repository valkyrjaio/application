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

use Valkyrja\Application\Env\Env as ValkyrjaEnv;
use Valkyrja\Http\Middleware\Contract\RequestReceivedMiddlewareContract;
use Valkyrja\Http\Server\Middleware\CacheResponseMiddleware;

final class Env extends ValkyrjaEnv
{
    /************************************************************
     *
     * Http Middleware component env variables.
     *
     ************************************************************/

    /** @var class-string<RequestReceivedMiddlewareContract>[]|null */
    public const array|null HTTP_MIDDLEWARE_REQUEST_RECEIVED = [
        CacheResponseMiddleware::class,
    ];
}
