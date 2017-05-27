<?php

namespace tests;

use config\EnvTest;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use tests\traits\TestRequest;
use Valkyrja\Application;
use Valkyrja\Support\Directory;

/**
 * Class TestCase.
 */
class TestCase extends PHPUnitTestCase
{
    use TestRequest;

    /**
     * @var \Valkyrja\Contracts\Application
     */
    protected $app;

    /**
     * Setup the test environment.
     *
     * @throws \Valkyrja\Exceptions\InvalidContainerImplementation
     * @throws \Valkyrja\Exceptions\InvalidDispatcherImplementation
     * @throws \Valkyrja\Exceptions\InvalidEventsImplementation
     *
     * @return void
     */
    public function setUp(): void
    {
        Directory::$BASE_PATH = realpath(__DIR__ . '/../');

        Application::env(EnvTest::class);

        $config = require Directory::configPath('configuration.php');

        $this->app = new Application($config);
    }
}
