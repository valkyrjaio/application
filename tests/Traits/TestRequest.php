<?php

namespace Tests\Traits;

use Valkyrja\Http\Message\Enum\RequestMethod;
use Valkyrja\Http\Message\Enum\StatusCode;
use Valkyrja\Http\Message\Factory\RequestFactory;
use Valkyrja\Http\Message\Response\Contract\RedirectResponse;
use Valkyrja\Http\Message\Response\Contract\Response;
use Valkyrja\Http\Server\Contract\RequestHandler;

/**
 * Trait TestRequest.
 */
trait TestRequest
{
    /**
     * Call the given URI and return the Response.
     *
     * @param string        $uri        The uri to call
     * @param RequestMethod $method     [optional] The method to use
     * @param array         $parameters [optional] Query parameters for the request
     * @param array         $cookies    [optional] Cookies for the request
     * @param array         $files      [optional] Files for the request
     * @param array         $server     [optional] Server variables for the request
     * @param string|null   $content    [optional] Content for the request
     *
     * @return Response
     */
    public function call(
        string $uri,
        RequestMethod $method = RequestMethod::GET,
        array $parameters = [],
        array $cookies = [],
        array $files = [],
        array $server = [],
        string $content = null
    ): Response {
        $request = RequestFactory::fromGlobals(
            $server,
        );

        return $this->app->getContainer()->getSingleton(RequestHandler::class)->handle($request);
    }

    /**
     * Assert that a given call has an ok status code.
     *
     * @param string        $uri        The uri to call
     * @param RequestMethod $method     [optional] The method to use
     * @param array         $parameters [optional] Query parameters for the request
     * @param array         $cookies    [optional] Cookies for the request
     * @param array         $files      [optional] Files for the request
     * @param array         $server     [optional] Server variables for the request
     * @param string|null   $content    [optional] Content for the request
     *
     * @return void
     */
    public function assertCallOk(
        string $uri,
        RequestMethod $method = RequestMethod::GET,
        array $parameters = [],
        array $cookies = [],
        array $files = [],
        array $server = [],
        string $content = null
    ): void {
        $response = $this->call($uri, $method, $parameters, $cookies, $files, $server, $content);

        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
    }

    /**
     * Assert that a given call has a 404 not found status code.
     *
     * @param string        $uri        The uri to call
     * @param RequestMethod $method     [optional] The method to use
     * @param array         $parameters [optional] Query parameters for the request
     * @param array         $cookies    [optional] Cookies for the request
     * @param array         $files      [optional] Files for the request
     * @param array         $server     [optional] Server variables for the request
     * @param string|null   $content    [optional] Content for the request
     *
     * @return void
     */
    public function assertCallNotFound(
        string $uri,
        RequestMethod $method = RequestMethod::GET,
        array $parameters = [],
        array $cookies = [],
        array $files = [],
        array $server = [],
        string $content = null
    ): void {
        $response = $this->call($uri, $method, $parameters, $cookies, $files, $server, $content);

        $this->assertEquals(StatusCode::NOT_FOUND, $response->getStatusCode());
    }

    /**
     * Assert that a given call has a redirect status code.
     *
     * @param string        $uri        The uri to call
     * @param RequestMethod $method     [optional] The method to use
     * @param array         $parameters [optional] Query parameters for the request
     * @param array         $cookies    [optional] Cookies for the request
     * @param array         $files      [optional] Files for the request
     * @param array         $server     [optional] Server variables for the request
     * @param string|null   $content    [optional] Content for the request
     *
     * @return void
     */
    public function assertCallRedirects(
        string $uri,
        RequestMethod $method = RequestMethod::GET,
        array $parameters = [],
        array $cookies = [],
        array $files = [],
        array $server = [],
        string $content = null
    ): void {
        $response = $this->call($uri, $method, $parameters, $cookies, $files, $server, $content);

        self::assertInstanceOf(RedirectResponse::class, $response);
    }
}
