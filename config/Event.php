<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Event\Config\Config as Model;

use function Valkyrja\cachePath;
use function Valkyrja\eventsPath;

/**
 * Class Event.
 */
class Event extends Model
{
    /**
     * Event constructor.
     */
    public function __construct()
    {
        $this->listeners = [];

        $this->filePath                  = eventsPath('default.php');
        $this->cacheFilePath             = cachePath('events.php');
        $this->useAnnotations            = false;
        $this->useAnnotationsExclusively = false;
        $this->useCache                  = false;

        parent::__construct([], false);
    }
}
