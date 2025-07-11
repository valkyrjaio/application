<?php

declare(strict_types=1);

namespace App\Http\Controller;

use Valkyrja\Application\Contract\Application;
use Valkyrja\Http\Message\Enum\RequestMethod;
use Valkyrja\Http\Message\Factory\Contract\ResponseFactory;
use Valkyrja\Http\Message\Response\Contract\JsonResponse;
use Valkyrja\Http\Message\Response\Contract\Response;
use Valkyrja\Http\Message\Response\Contract\TextResponse;
use Valkyrja\Http\Routing\Attribute\Parameter;
use Valkyrja\Http\Routing\Attribute\Route;
use Valkyrja\Http\Routing\Constant\Regex;
use Valkyrja\View\Factory\Contract\ResponseFactory as ViewResponseFactory;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * Welcome action.
     * - Example of a view being returned.
     */
    #[Route(path: '/', name: 'welcome')]
    public function welcome(ViewResponseFactory $responseFactory): Response
    {
        return $responseFactory->createResponseFromView('index');
    }

    /**
     * Dynamic action.
     * - Example of a view being returned.
     */
    #[Route(path: '/{value}', name: 'dynamicValue')]
    public function dynamic(
        ViewResponseFactory $responseFactory,
        #[Parameter(name: 'value', regex: Regex::ALPHA)]
        string $value
    ): Response {
        return $responseFactory->createResponseFromView('dynamic/dynamic', ['value' => $value]);
    }

    /**
     * Home action.
     */
    #[Route\RequestMethod\Get]
    #[Route\RequestMethod\Head]
    #[Route(path: '/home', name: 'home')]
    public function home(ViewResponseFactory $responseFactory): Response
    {
        return $responseFactory->createResponseFromView('home/home');
    }

    /**
     * Json action.
     */
    #[Route(path: '/json', name: 'json')]
    public function json(ResponseFactory $responseFactory): JsonResponse
    {
        return $responseFactory->createJsonResponse(['Json response example']);
    }

    /**
     * Application version action.
     */
    #[Route(path: '/version', name: 'version', requestMethods: [RequestMethod::GET])]
    #[Route(path: '/version', name: 'version.post', requestMethods: [RequestMethod::POST])]
    #[Route(path: '/version', name: 'version.put', requestMethods: [RequestMethod::PUT])]
    public static function version(Application $app, ResponseFactory $responseFactory): TextResponse
    {
        return $responseFactory->createTextResponse($app->getVersion());
    }
}
