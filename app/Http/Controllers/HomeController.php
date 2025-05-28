<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Valkyrja\Http\Message\Enum\RequestMethod;
use Valkyrja\Http\Message\Factory\Contract\ResponseFactory;
use Valkyrja\Http\Message\Response\Contract\Response;
use Valkyrja\Http\Routing\Attribute\Parameter;
use Valkyrja\Http\Routing\Attribute\Route;
use Valkyrja\Http\Routing\Attribute\Route\RequestMethod\Any;
use Valkyrja\Http\Routing\Attribute\Route\RequestMethod\Get;
use Valkyrja\View\Factory\Contract\ResponseFactory as ViewResponseFactory;

use function Valkyrja\app;

/**
 * Class HomeController.
 */
#[Route(path: '/', name: 'home')]
class HomeController extends \Valkyrja\Http\Routing\Controller\Controller
{
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
    #[Route(path: '/{dynamicValue}', name: 'dynamicValue')]
    #[Parameter(name: 'dynamicValue', regex: '[a-zA-Z]+')]
    public function dynamic(ViewResponseFactory $responseFactory): Response
    {
        return $responseFactory->createResponseFromView('index');
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
    #[Route(path: '/version', name: 'version', methods: [RequestMethod::GET])]
    #[Route(path: '/version', name: 'version.post', methods: [RequestMethod::POST])]
    #[Route(path: '/version', name: 'version.put', methods: [RequestMethod::PUT])]
    #[Route(path: '/version', name: 'version.patch.redirect', methods: [RequestMethod::PATCH], to: '/version/patch')]
    public static function version(ResponseFactory $responseFactory): Response
    {
        return $responseFactory->createResponse(app()->getVersion());
    }
}
