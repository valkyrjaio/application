<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Valkyrja\Application\Contract\Application;
use Valkyrja\Http\Message\Enum\RequestMethod;
use Valkyrja\Http\Message\Factory\Contract\ResponseFactory;
use Valkyrja\Http\Message\Response\Contract\Response;
use Valkyrja\Http\Routing\Attribute\Parameter;
use Valkyrja\Http\Routing\Attribute\Route;
use Valkyrja\Http\Routing\Attribute\Route\RequestMethod\Any;
use Valkyrja\Http\Routing\Attribute\Route\RequestMethod\Get;
use Valkyrja\Http\Routing\Constant\Regex;
use Valkyrja\View\Factory\Contract\ResponseFactory as ViewResponseFactory;

/**
 * Class HomeController.
 */
#[Route(path: '/', name: 'home')]
class HomeController extends Controller
{
    /**
     * Const routing example.
     *
     * @var string
     */
    #[Route(path: '/version', name: 'version', requestMethods: [RequestMethod::GET])]
    #[Route(path: '/version', name: 'version.post', requestMethods: [RequestMethod::POST])]
    #[Route(path: '/version', name: 'version.put', requestMethods: [RequestMethod::PUT])]
    public const string VERSION = Application::VERSION;

    /**
     * Property routing example.
     *
     * @var string
     */
    #[Route(path: '/property', name: 'property')]
    public string $propertyRouting = 'Property Routing Example';

    /**
     * Static property routing example.
     *
     * @var string
     */
    #[Any]
    #[Route(path: '/static-property', name: 'staticProperty')]
    public static string $staticPropertyRouting = 'Static Property Routing Example';

    /**
     * Static property json routing example.
     *
     * @var array<array-key, string>
     */
    #[Any]
    #[Route(path: '/json', name: 'json')]
    public static array $jsonPropertyRouting = ['Static Property Routing Json Example'];

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
    #[Parameter(name: 'value', regex: Regex::ALPHA)]
    public function dynamic(ViewResponseFactory $responseFactory, string $value): Response
    {
        return $responseFactory->createResponseFromView('dynamic/dynamic', ['value' => $value]);
    }

    /**
     * Home action.
     */
    #[Get]
    #[Route(path: '/home', name: 'home')]
    public function home(ViewResponseFactory $responseFactory): Response
    {
        return $responseFactory->createResponseFromView('home/home');
    }

    /**
     * Application version action.
     * - Example of string being returned.
     */
    #[Route(path: '/version-method', name: 'version-method', requestMethods: [RequestMethod::GET])]
    #[Route(path: '/version-method', name: 'version-method.post', requestMethods: [RequestMethod::POST])]
    #[Route(path: '/version-method', name: 'version-method.put', requestMethods: [RequestMethod::PUT])]
    public static function version(Application $app, ResponseFactory $responseFactory): Response
    {
        return $responseFactory->createResponse($app->getVersion());
    }
}
