<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Configs\Cache as Model;
use Valkyrja\Config\Enums\ConfigKeyPart;

/**
 * Class Cache.
 */
class Cache extends Model
{
    /**
     * Cache constructor.
     */
    public function __construct()
    {
        parent::__construct(false);

        $this->setDefault(ConfigKeyPart::REDIS);
        $this->setStores([]);
    }
}
