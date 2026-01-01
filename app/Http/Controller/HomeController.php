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

namespace App\Http\Controller;

use Valkyrja\Application\Kernel\Contract\ApplicationContract;
use Valkyrja\Http\Message\Enum\RequestMethod;
use Valkyrja\Http\Message\Factory\Contract\ResponseFactoryContract;
use Valkyrja\Http\Message\Response\Contract\JsonResponseContract;
use Valkyrja\Http\Message\Response\Contract\ResponseContract;
use Valkyrja\Http\Message\Response\Contract\TextResponseContract;
use Valkyrja\Http\Routing\Attribute\Parameter;
use Valkyrja\Http\Routing\Attribute\Route;
use Valkyrja\Http\Routing\Constant\Regex;
use Valkyrja\Http\Routing\Data\Contract\RouteContract;
use Valkyrja\View\Factory\Contract\ResponseFactoryContract as ViewResponseFactoryContract;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * Application version action.
     */
    #[Route(path: '/version', name: 'version', requestMethods: [RequestMethod::GET])]
    #[Route(path: '/version', name: 'version.post', requestMethods: [RequestMethod::POST])]
    #[Route(path: '/version', name: 'version.put', requestMethods: [RequestMethod::PUT])]
    public static function version(ApplicationContract $app, ResponseFactoryContract $responseFactory): TextResponseContract
    {
        return $responseFactory->createTextResponse($app->getVersion());
    }

    /**
     * Welcome action.
     * - Example of a view being returned.
     */
    #[Route(path: '/', name: 'welcome')]
    public function welcome(ViewResponseFactoryContract $responseFactory): ResponseContract
    {
        return $responseFactory->createResponseFromView('index');
    }

    /**
     * Dynamic action.
     * - Example of a view being returned.
     */
    #[Route(path: '/{value}', name: 'dynamicValue')]
    public function dynamic(
        RouteContract $route,
        ViewResponseFactoryContract $responseFactory,
        #[Parameter(name: 'value', regex: Regex::ALPHA)]
        string $value
    ): ResponseContract {
        return $responseFactory->createResponseFromView('dynamic/dynamic', ['value' => $value]);
    }

    /**
     * Home action.
     */
    #[Route\RequestMethod\Get]
    #[Route\RequestMethod\Head]
    #[Route(path: '/home', name: 'home')]
    public function home(ViewResponseFactoryContract $responseFactory): ResponseContract
    {
        return $responseFactory->createResponseFromView('home/home');
    }

    /**
     * Json action.
     */
    #[Route(path: '/json', name: 'json')]
    public function json(ResponseFactoryContract $responseFactory): JsonResponseContract
    {
        return $responseFactory->createJsonResponse(['Json response example']);
    }
}
