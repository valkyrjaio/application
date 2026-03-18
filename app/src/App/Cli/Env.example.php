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

namespace App\Cli;

use App\Cli\Provider\ComponentProvider;
use Valkyrja\Application\Env\Env as ValkyrjaEnv;
use Valkyrja\Application\Kernel\Contract\ApplicationContract;
use Valkyrja\Application\Provider\Contract\ProviderContract;

final class Env extends ValkyrjaEnv
{
    /** @var bool */
    public const bool APP_DEBUG_MODE = true;
    /** @var class-string<ProviderContract>[] */
    public const array APP_CUSTOM_COMPONENTS = [
        ComponentProvider::class,
    ];
    /** @var non-empty-string */
    public const string APP_NAMESPACE = 'App';
    /** @var non-empty-string */
    public const string APP_DATA_PATH = 'App/Cli/Provider/Data';
    /** @var non-empty-string */
    public const string APP_DATA_NAMESPACE = 'App\\Cli\\Provider\\Data';
    /** @var (callable(ApplicationContract):void)[] */
    public const array APP_PUBLISHABLE_CALLBACKS = [
        [ComponentProvider::class, 'publish'],
    ];
    /** @var string */
    public const string APP_DIR = __DIR__ . '/../../..';
}
