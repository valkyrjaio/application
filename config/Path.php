<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Config\Configs\Path as Model;
use Valkyrja\Path\Enums\Config;

/**
 * Class Path.
 */
class Path extends Model
{
    /**
     * The patterns.
     *
     * @var array
     */
    public array $patterns = [];

    /**
     * Path constructor.
     */
    public function __construct()
    {
        parent::__construct(false);

        $this->setPatterns(array_merge(Config::PATTERNS, $this->patterns));
    }
}
