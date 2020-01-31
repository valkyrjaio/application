<?php

namespace tests;

use env\EnvTest;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use tests\traits\TestRequest;
use Valkyrja\Application\Application;
use Valkyrja\Application\Applications\Valkyrja;
use Valkyrja\Support\Directory;

/**
 * Class TestCase.
 */
class TestCase extends PHPUnitTestCase
{
    use TestRequest;

    /**
     * @var Application
     */
    protected $app;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        Directory::$BASE_PATH = __DIR__ . '/../';

        Valkyrja::setEnv(EnvTest::class);

        $this->app = new Valkyrja();
    }
}
