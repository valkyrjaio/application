<?php

declare(strict_types=1);

use App\Entry\App;
use App\Env\Env;

define('INDEX_START', microtime(true));

require_once __DIR__ . '/../vendor/autoload.php';

App::http(Env::APP_DIR, new Env());
