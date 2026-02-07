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

namespace App\Tests\Functional\Abstract;

use App\Http\App;
use App\Tests\Env;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Valkyrja\Application\Kernel\Contract\ApplicationContract;

abstract class TestCase extends PHPUnitTestCase
{
    protected ApplicationContract $app;

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        $this->app = App::app(
            env: new Env(),
        );
    }
}
