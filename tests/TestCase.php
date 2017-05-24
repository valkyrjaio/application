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
     * @return void
     */
    public function setUp(): void
    {
        Directory::$BASE_PATH = realpath(__DIR__ . '/../');

        $config = require \Valkyrja\Support\Directory::configPath('configuration.php');

        \Valkyrja\Application::env(EnvTest::class);

        $this->app = new Application($config);
    }
}
