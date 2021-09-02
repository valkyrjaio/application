<?php

declare(strict_types=1);

namespace Config;

use App\Http\Kernel;
use Valkyrja\Application\Application;
use Valkyrja\Application\Config\Config as Model;
use Valkyrja\Application\Constants\ConfigValue;

/**
 * Class App.
 */
class App extends Model
{
    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->env              = 'production';
        $this->debug            = false;
        $this->url              = 'localhost';
        $this->timezone         = 'UTC';
        $this->version          = Application::VERSION;
        $this->key              = 'some_secret_app_key';
        $this->exceptionHandler = ConfigValue::EXCEPTION_HANDLER;
        $this->httpKernel       = Kernel::class;
        $this->providers        = array_merge(ConfigValue::PROVIDERS, []);

        parent::__construct([], true);
    }
}
