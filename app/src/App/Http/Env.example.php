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

namespace App\Http;

use App\Env\Env as AppEnv;
use App\Http\Provider\ComponentProvider;
use Valkyrja\Application\Kernel\Contract\ApplicationContract;

final class Env extends AppEnv
{
    /** @var non-empty-string */
    public const string APP_DATA_PATH = 'App/Http/Provider/Data';
    /** @var non-empty-string */
    public const string APP_DATA_NAMESPACE = 'App\\Http\\Provider\\Data';
    /** @var (callable(ApplicationContract):void)[] */
    public const array APP_PUBLISHABLE_CALLBACKS = [
        [ComponentProvider::class, 'publish'],
    ];
}
