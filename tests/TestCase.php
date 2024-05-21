<?php

namespace Tests;

use Env\EnvTest;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Tests\Traits\TestRequest;
use Valkyrja\Application\Contract\Application;
use Valkyrja\Application\Valkyrja;
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
