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

namespace App\Env;

use App\Http\Provider\ComponentProvider;
use App\Orm\Entity\User;
use Valkyrja\Application\Env\Env as ValkyrjaEnv;
use Valkyrja\Application\Provider\Provider;

class Env extends ValkyrjaEnv
{
    /************************************************************
     *
     * Application component env variables.
     *
     ************************************************************/

    /** @var bool */
    public const bool APP_DEBUG_MODE = true;
    /** @var non-empty-string */
    public const string APP_NAMESPACE = 'App';
    /** @var class-string<Provider>[] */
    public const array APP_CUSTOM_COMPONENTS = [
        ComponentProvider::class,
    ];
    /** @var string */
    public const string APP_DIR = __DIR__ . '/../../..';

    /************************************************************
     *
     * Auth component env variables.
     *
     ************************************************************/

    public const string AUTH_DEFAULT_USER_ENTITY = User::class;
}
