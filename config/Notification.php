<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Notification\Config\Config as Model;
use Valkyrja\Notification\Constants\ConfigValue;

/**
 * Class Notification.
 */
class Notification extends Model
{
    /**
     * Notification constructor.
     */
    public function __construct()
    {
        $this->notifications = array_merge(ConfigValue::NOTIFICATIONS, []);

        parent::__construct(null, true);
    }
}
