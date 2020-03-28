<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Configs\Event as Model;

use function Valkyrja\cachePath;
use function Valkyrja\eventsPath;

/**
 * Class Event.
 */
class Event extends Model
{
    /**
     * The annotated listeners.
     *
     * @var array
     */
    public array $listeners = [];

    /**
     * Event constructor.
     */
    public function __construct()
    {
        parent::__construct(false);

        $this->setListeners($this->listeners);

        $this->setFilePath(eventsPath('default.php'));
        $this->setCacheFilePath(cachePath('events.php'));
        $this->setUseCache(false);
        $this->setUseAnnotations(false);
        $this->setUseAnnotationsExclusively(false);
    }
}
