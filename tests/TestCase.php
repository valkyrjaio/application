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

namespace Tests;

use App\Entry\Http;
use App\Env\EnvTest;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Valkyrja\Application\Kernel\Contract\ApplicationContract;
use Valkyrja\Http\Message\Request\Contract\ServerRequestContract;
use Valkyrja\Http\Message\Request\Factory\RequestFactory;

/**
 * Class TestCase.
 */
class TestCase extends PHPUnitTestCase
{
    /**
     * @var ApplicationContract
     */
    protected ApplicationContract $app;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        Http::directory(dir: __DIR__ . '/../');

        $this->app = $app = Http::app(
            env: EnvTest::class,
        );

        $container = $app->getContainer();
        $container->setSingleton(ServerRequestContract::class, RequestFactory::fromGlobals());
    }
}
