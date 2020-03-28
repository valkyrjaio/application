<?php

declare(strict_types=1);

namespace Config;

use App\Http\Controllers\HomeController;
use Valkyrja\Config\Configs\Routing as Model;

use function Valkyrja\cachePath;
use function Valkyrja\routesPath;

/**
 * Class Routing.
 */
class Routing extends Model
{
    /**
     * The middleware.
     *
     * @var array
     */
    public array $middleware = [];

    /**
     * The middleware groups.
     *
     * @var array
     */
    public array $middlewareGroups = [];

    /**
     * The annotated controllers.
     *
     * @var array
     */
    public array $controllers = [
        HomeController::class,
    ];

    /**
     * Routing constructor.
     */
    public function __construct()
    {
        parent::__construct(false);

        $this->setMiddleware($this->middleware);
        $this->setMiddlewareGroups($this->middlewareGroups);
        $this->setControllers($this->controllers);
        $this->setUseTrailingSlash(false);
        $this->setUseAbsoluteUrls(false);

        $this->setFilePath(routesPath('default.php'));
        $this->setCacheFilePath(cachePath('routing.php'));
        $this->setUseCache(false);
        $this->setUseAnnotations(false);
        $this->setUseAnnotationsExclusively(false);
    }
}
