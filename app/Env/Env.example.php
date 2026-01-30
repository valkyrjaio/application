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

namespace App\Env;

use App\Orm\Entity\User;
use App\Provider\ComponentProvider;
use Valkyrja\Application\Env\Env as ValkyrjaEnv;
use Valkyrja\Http\Routing\Middleware\RouteNotMatched\ViewRouteNotMatchedMiddleware;
use Valkyrja\Http\Server\Middleware\LogThrowableCaughtMiddleware;
use Valkyrja\Http\Server\Middleware\ViewThrowableCaughtMiddleware;

/**
 * Class Env.
 */
class Env extends ValkyrjaEnv
{
    /************************************************************
     *
     * Application component env variables.
     *
     ************************************************************/

    /** @var bool */
    public const bool APP_DEBUG_MODE = true;
    /** @var non-empty-string */
    public const string APP_NAMESPACE = 'App';
    /** @var class-string<\Valkyrja\Application\Provider\Provider>[] */
    public const array APP_CUSTOM_COMPONENTS = [
        ComponentProvider::class,
    ];
    /** @var string */
    public const string APP_DIR = __DIR__ . '/../..';

    /************************************************************
     *
     * Auth component env variables.
     *
     ************************************************************/

    public const string AUTH_DEFAULT_USER_ENTITY = User::class;

    /************************************************************
     *
     * Http Middleware component env variables.
     *
     ************************************************************/

    public const array HTTP_MIDDLEWARE_ROUTE_NOT_MATCHED = [
        ViewRouteNotMatchedMiddleware::class,
    ];

    public const array HTTP_MIDDLEWARE_THROWABLE_CAUGHT = [
        LogThrowableCaughtMiddleware::class,
        ViewThrowableCaughtMiddleware::class,
    ];
}
