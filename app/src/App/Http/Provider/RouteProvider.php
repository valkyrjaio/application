<?php

declare(strict_types=1);

/*
 * This file is part of the Valkyrja Application package.
 *
 * (c) Melech Mizrachi <melechmizrachi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Http\Provider;

use App\Http\Controller\HomeController;
use Override;
use Valkyrja\Application\Kernel\Contract\ApplicationContract;
use Valkyrja\Container\Manager\Contract\ContainerContract;
use Valkyrja\Http\Message\Response\Contract\ResponseContract;
use Valkyrja\Http\Message\Response\Factory\Contract\ResponseFactoryContract;
use Valkyrja\Http\Routing\Data\Contract\RouteContract;
use Valkyrja\Http\Routing\Provider\Contract\HttpRouteProviderContract;
use Valkyrja\View\Factory\Contract\ResponseFactoryContract as ViewResponseFactoryContract;

final class RouteProvider implements HttpRouteProviderContract
{
    /**
     * @inheritDoc
     */
    #[Override]
    public static function getControllerClasses(): array
    {
        return [
            HomeController::class,
        ];
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public static function getRoutes(): array
    {
        return [];
    }

    /**
     * @param array<array-key, mixed> $arguments The arguments
     */
    public static function versionHandler(ContainerContract $container, array $arguments): ResponseContract
    {
        return HomeController::version(
            $container->getSingleton(ApplicationContract::class),
            $container->getSingleton(ResponseFactoryContract::class),
        );
    }

    /**
     * @param array<array-key, mixed> $arguments The arguments
     */
    public static function textHandler(ContainerContract $container, array $arguments): ResponseContract
    {
        return HomeController::text();
    }

    /**
     * @param array<array-key, mixed> $arguments The arguments
     */
    public static function welcomeHandler(ContainerContract $container, array $arguments): ResponseContract
    {
        return $container->getSingleton(HomeController::class)->welcome(
            $container->getSingleton(ViewResponseFactoryContract::class),
        );
    }

    /**
     * @param array<array-key, mixed> $arguments The arguments
     */
    public static function welcomeCachedHandler(ContainerContract $container, array $arguments): ResponseContract
    {
        return $container->getSingleton(HomeController::class)->welcomeCached(
            $container->getSingleton(ViewResponseFactoryContract::class),
        );
    }

    /**
     * @param array<array-key, mixed> $arguments The arguments
     */
    public static function dynamicHandler(ContainerContract $container, array $arguments): ResponseContract
    {
        return $container->getSingleton(HomeController::class)->dynamic(
            $container->getSingleton(RouteContract::class),
            $container->getSingleton(ViewResponseFactoryContract::class),
            ...$arguments
        );
    }

    /**
     * @param array<array-key, mixed> $arguments The arguments
     */
    public static function homeHandler(ContainerContract $container, array $arguments): ResponseContract
    {
        return $container->getSingleton(HomeController::class)->home(
            $container->getSingleton(ViewResponseFactoryContract::class),
        );
    }

    /**
     * @param array<array-key, mixed> $arguments The arguments
     */
    public static function jsonHandler(ContainerContract $container, array $arguments): ResponseContract
    {
        return $container->getSingleton(HomeController::class)->json(
            $container->getSingleton(ResponseFactoryContract::class),
        );
    }
}
