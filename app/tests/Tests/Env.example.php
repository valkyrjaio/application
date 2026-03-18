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

namespace App\Tests;

use Valkyrja\Application\Env\Env as ValkyrjaEnv;

class Env extends ValkyrjaEnv
{
    /** @var string */
    public const string APP_DIR = __DIR__ . '/../..';

    /************************************************************
     *
     * Cli Interaction component env variables.
     *
     ************************************************************/

    /** @var bool */
    public const bool CLI_INTERACTION_IS_QUIET = true;
}
