<?php

declare(strict_types=1);

namespace Env;

use App\Component;
use App\Orm\Entity\User;
use Valkyrja\Application\Constant\ComponentClass;
use Valkyrja\Application\Env as AppEnv;
use Valkyrja\Http\Routing\Middleware\ViewRouteNotMatchedMiddleware;
use Valkyrja\Http\Server\Middleware\LogThrowableCaughtMiddleware;
use Valkyrja\Http\Server\Middleware\ViewThrowableCaughtMiddleware;

/**
 * Class Env.
 */
class Env extends AppEnv
{
    /************************************************************
     *
     * Application component env variables.
     *
     ************************************************************/

    public const bool|null APP_DEBUG_MODE = true;

    public const array|null APP_COMPONENTS = [
        ComponentClass::API,
        ComponentClass::ASSET,
        ComponentClass::AUTH,
        ComponentClass::BROADCAST,
        ComponentClass::CACHE,
        ComponentClass::CRYPT,
        ComponentClass::FILESYSTEM,
        ComponentClass::JWT,
        ComponentClass::LOG,
        ComponentClass::MAIL,
        ComponentClass::NOTIFICATION,
        ComponentClass::ORM,
        ComponentClass::SESSION,
        ComponentClass::SMS,
        ComponentClass::VIEW,
        Component::class,
    ];

    /************************************************************
     *
     * Auth component env variables.
     *
     ************************************************************/

    public const string|null AUTH_DEFAULT_USER_ENTITY = User::class;

    /************************************************************
     *
     * Http Middleware component env variables.
     *
     ************************************************************/

    public const array|null HTTP_MIDDLEWARE_ROUTE_NOT_MATCHED = [
        ViewRouteNotMatchedMiddleware::class,
    ];

    public const array|null HTTP_MIDDLEWARE_THROWABLE_CAUGHT = [
        LogThrowableCaughtMiddleware::class,
        ViewThrowableCaughtMiddleware::class,
    ];
}
