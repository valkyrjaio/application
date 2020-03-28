<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Configs\View as Model;
use Valkyrja\View\Enums\Config;

use function Valkyrja\resourcesPath;

/**
 * Class View.
 */
class View extends Model
{
    /**
     * The engines.
     *
     * @var array
     */
    public array $engines = [];

    /**
     * The paths.
     *
     * @example
     * <code>
     *      [
     *         '@path' => '/some/path/on/disk',
     *      ]
     * </code>
     * Then we can do:
     * <code>
     *      view('@path/template');
     *      $view->layout('@path/layout');
     *      $view->partial('@path/partials/partial');
     * </code>
     *
     * @var array
     */
    public array $paths = [];

    /**
     * View constructor.
     */
    public function __construct()
    {
        parent::__construct(false);

        $this->setDir(resourcesPath('views'));
        $this->setEngine(Config::ENGINE);
        $this->setEngines(array_merge(Config::ENGINES, $this->engines));
        $this->setPaths($this->paths);
    }
}
