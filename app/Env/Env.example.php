<?php

declare(strict_types=1);

namespace App\Env;

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

    public const bool APP_DEBUG_MODE = true;
    /** @var non-empty-string */
    public const string APP_NAMESPACE = 'App';

    public const array APP_COMPONENTS = [
        ComponentClass::API,
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
    /** @var string */
    public const string APP_DIR = __DIR__ . '/../..';
    /** @var string */
    public const string APP_CACHE_FILE_PATH = self::APP_DIR . '/storage/framework/cache/cache.php';

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

    /************************************************************
     *
     * View component env variables.
     *
     ************************************************************/

    /** @var non-empty-string */
    public const string VIEW_ORKA_DIR = self::APP_DIR . '/resources/views';
    /** @var non-empty-string */
    public const string VIEW_PHP_DIR = self::APP_DIR . '/resources/views';
    /** @var non-empty-string */
    public const string VIEW_TWIG_COMPILED_DIR = self::APP_DIR . '/storage/views';
}
