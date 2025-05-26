<?php

declare(strict_types=1);

use App\App;
use Config\Config;
use Config\DataConfig;
use Env\Env;

define('INDEX_START', microtime(true));

require_once __DIR__ . '/../vendor/autoload.php';

App::http(__DIR__ . '/..', Env::class, Config::class, DataConfig::class);
