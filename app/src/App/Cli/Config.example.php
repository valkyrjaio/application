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
use App\Http\Config as AppHttpConfig;
use Valkyrja\Application\Data\CliConfig;
use Valkyrja\Application\Data\HttpConfig;
use Valkyrja\Application\Kernel\Contract\ApplicationContract;
use Valkyrja\Application\Provider\Contract\ComponentProviderContract;
use Valkyrja\Cli\Interaction\Provider\CliInteractionComponentProvider;
use Valkyrja\Cli\Middleware\Provider\CliMiddlewareComponentProvider;
use Valkyrja\Cli\Routing\Provider\CliRoutingComponentProvider;
use Valkyrja\Cli\Server\Constant\CommandName;
use Valkyrja\Cli\Server\Provider\CliServerComponentProvider;
use Valkyrja\Container\Provider\ContainerComponentProvider;
use Valkyrja\Dispatch\Provider\DispatchComponentProvider;
use Valkyrja\Event\Provider\EventComponentProvider;
use Valkyrja\Http\Message\Provider\HttpMessageComponentProvider;
use Valkyrja\Http\Middleware\Provider\HttpMiddlewareComponentProvider;
use Valkyrja\Http\Routing\Provider\HttpRoutingCliComponentProvider;
use Valkyrja\Http\Routing\Provider\HttpRoutingComponentProvider;
use Valkyrja\Http\Server\Provider\HttpServerComponentProvider;
use Valkyrja\Log\Provider\LogComponentProvider;

final class Config extends CliConfig
{
    /**
     * @param non-empty-string                          $namespace
     * @param non-empty-string                          $dir
     * @param non-empty-string                          $version
     * @param non-empty-string                          $environment
     * @param non-empty-string                          $timezone
     * @param non-empty-string                          $key
     * @param non-empty-string                          $dataPath
     * @param non-empty-string                          $dataNamespace
     * @param non-empty-string                          $applicationName
     * @param non-empty-string                          $defaultCommandName
     * @param class-string<ComponentProviderContract>[] $providers
     * @param array<callable(ApplicationContract):void> $callbacks
     */
    public function __construct(
        string $namespace = 'App',
        string $dir = __DIR__ . '/../../..',
        string $version = '1.0.0',
        string $environment = 'production',
        bool $debugMode = true,
        string $timezone = 'UTC',
        string $key = 'some_secret_app_key',
        string $dataPath = 'App/Cli/Provider/Data',
        string $dataNamespace = 'App\\Cli\\Provider\\Data',
        string $applicationName = 'cli',
        string $defaultCommandName = CommandName::LIST,
        array $providers = [
            ContainerComponentProvider::class,
            DispatchComponentProvider::class,
            CliInteractionComponentProvider::class,
            CliMiddlewareComponentProvider::class,
            CliRoutingComponentProvider::class,
            CliServerComponentProvider::class,
            EventComponentProvider::class,
            HttpMessageComponentProvider::class,
            HttpMiddlewareComponentProvider::class,
            HttpRoutingComponentProvider::class,
            HttpRoutingCliComponentProvider::class,
            HttpServerComponentProvider::class,
            LogComponentProvider::class,
            ComponentProvider::class,
        ],
        array $callbacks = [
            [ComponentProvider::class, 'publish'],
        ],
        HttpConfig $http = new AppHttpConfig(),
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
            applicationName: $applicationName,
            defaultCommandName: $defaultCommandName,
            providers: $providers,
            callbacks: $callbacks,
            http: $http,
        );
    }
}
