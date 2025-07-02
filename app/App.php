<?php

namespace App;

use Config\AppConfig;
use Valkyrja\Application\Config;
use Valkyrja\Application\Entry\App as Valkyrja;

/**
 * Class App.
 */
class App extends Valkyrja
{
    protected static function getConfig(): Config
    {
        return new AppConfig();
    }
}
