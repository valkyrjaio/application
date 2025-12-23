<?php

declare(strict_types=1);

namespace App\Env;

use App\Component;
use App\Orm\Entity\User;
use Valkyrja\Application\Constant\ComponentClass;
use Valkyrja\Http\Routing\Middleware\ViewRouteNotMatchedMiddleware;
use Valkyrja\Http\Server\Middleware\LogThrowableCaughtMiddleware;
use Valkyrja\Http\Server\Middleware\ViewThrowableCaughtMiddleware;
use Valkyrja\Application\Env as ValkyrjaEnv;

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
    /** @var class-string<\Valkyrja\Application\Support\Component>[] */
    public const array APP_CUSTOM_COMPONENTS = [
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
