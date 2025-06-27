<?php

namespace Tests;

use App\App;
use Config\Config;
use Env\EnvTest;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Valkyrja\Application\Contract\Application;
use Valkyrja\Http\Message\Factory\RequestFactory;
use Valkyrja\Http\Message\Request\Contract\ServerRequest;

/**
 * Class TestCase.
 */
class TestCase extends PHPUnitTestCase
{
    /**
     * @var Application
     */
    protected Application $app;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        App::directory(dir: __DIR__ . '/../');

        $this->app = $app = App::app(
            env: EnvTest::class,
            config: Config::class,
        );

        $container = App::getContainer($app);
        $container->setSingleton(ServerRequest::class, RequestFactory::fromGlobals());
    }
}
