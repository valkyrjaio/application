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

use App\Http\App;
use App\Http\Env;

define('INDEX_START', microtime(true));

require_once __DIR__ . '/../../vendor/autoload.php';

App::run(Env::APP_DIR, new Env());
