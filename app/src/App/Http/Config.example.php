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

use App\Http\Provider\ComponentProvider;
use Valkyrja\Application\Constant\ComponentClass;
use Valkyrja\Application\Data\HttpConfig as ValkyrjaConfig;
use Valkyrja\Application\Kernel\Contract\ApplicationContract;
use Valkyrja\Application\Provider\Contract\ComponentProviderContract;
use Valkyrja\Http\Middleware\Contract\RequestReceivedMiddlewareContract;
use Valkyrja\Http\Middleware\Contract\RouteDispatchedMiddlewareContract;
use Valkyrja\Http\Middleware\Contract\RouteMatchedMiddlewareContract;
use Valkyrja\Http\Middleware\Contract\RouteNotMatchedMiddlewareContract;
use Valkyrja\Http\Middleware\Contract\SendingResponseMiddlewareContract;
use Valkyrja\Http\Middleware\Contract\TerminatedMiddlewareContract;
use Valkyrja\Http\Middleware\Contract\ThrowableCaughtMiddlewareContract;
use Valkyrja\Http\Middleware\Data\Contract\ConfigContract;
use Valkyrja\Http\Server\Middleware\CacheResponseMiddleware;

final class Config extends ValkyrjaConfig implements ConfigContract
{
    /**
     * @param non-empty-string                                  $namespace
     * @param non-empty-string                                  $dir
     * @param non-empty-string                                  $version
     * @param non-empty-string                                  $environment
     * @param non-empty-string                                  $timezone
     * @param non-empty-string                                  $key
     * @param non-empty-string                                  $dataPath
     * @param non-empty-string                                  $dataNamespace
     * @param class-string<ComponentProviderContract>[]         $providers
     * @param array<callable(ApplicationContract):void>         $callbacks
     * @param class-string<RequestReceivedMiddlewareContract>[] $requestReceivedMiddleware
     * @param class-string<RouteMatchedMiddlewareContract>[]    $routeMatchedMiddleware
     * @param class-string<RouteNotMatchedMiddlewareContract>[] $routeNotMatchedMiddleware
     * @param class-string<RouteDispatchedMiddlewareContract>[] $routeDispatchedMiddleware
     * @param class-string<ThrowableCaughtMiddlewareContract>[] $throwableCaughtMiddleware
     * @param class-string<SendingResponseMiddlewareContract>[] $sendingResponseMiddleware
     * @param class-string<TerminatedMiddlewareContract>[]      $terminatedMiddleware
     */
    public function __construct(
        string $namespace = 'App',
        string $dir = __DIR__ . '/../../..',
        string $version = '1.0.0',
        string $environment = 'production',
        bool $debugMode = true,
        string $timezone = 'UTC',
        string $key = 'some_secret_app_key',
        string $dataPath = 'App/Http/Provider/Data',
        string $dataNamespace = 'App\\Http\\Provider\\Data',
        array $providers = [
            ComponentClass::CONTAINER,
            ComponentClass::DISPATCHER,
            ComponentClass::EVENT,
            ComponentClass::HTTP_MESSAGE,
            ComponentClass::HTTP_MIDDLEWARE,
            ComponentClass::HTTP_ROUTING,
            ComponentClass::HTTP_SERVER,
            ComponentClass::LOG,
            ComponentClass::VIEW,
            ComponentProvider::class,
        ],
        array $callbacks = [
            [ComponentProvider::class, 'publish'],
        ],
        public array $requestReceivedMiddleware = [
            CacheResponseMiddleware::class,
        ],
        public array $routeMatchedMiddleware = [],
        public array $routeNotMatchedMiddleware = [],
        public array $routeDispatchedMiddleware = [],
        public array $throwableCaughtMiddleware = [],
        public array $sendingResponseMiddleware = [],
        public array $terminatedMiddleware = [],
    ) {
        parent::__construct(
            namespace: $namespace,
            dir: $dir,
            version: $version,
            environment: $environment,
            debugMode: $debugMode,
            timezone: $timezone,
            key: $key,
            dataPath: $dataPath,
            dataNamespace: $dataNamespace,
            providers: $providers,
            callbacks: $callbacks,
        );
    }
}
