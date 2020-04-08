<?php

declare(strict_types=1);

namespace Config;

use App\Http\Controllers\HomeController;
use Valkyrja\Routing\Config\Config as Model;

use function Valkyrja\cachePath;
use function Valkyrja\routesPath;

/**
 * Class Routing.
 */
class Routing extends Model
{
    /**
     * Routing constructor.
     */
    public function __construct()
    {
        $this->middleware       = [];
        $this->middlewareGroups = [];
        $this->controllers      = [
            HomeController::class,
        ];
        $this->useTrailingSlash = false;
        $this->useAbsoluteUrls  = false;

        $this->filePath                  = routesPath('default.php');
        $this->cacheFilePath             = cachePath('routes.php');
        $this->useAnnotations            = false;
        $this->useAnnotationsExclusively = false;
        $this->useCache                  = false;

        parent::__construct([], false);
    }
}
