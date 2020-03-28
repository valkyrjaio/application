<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Annotation\Enums\Config;
use Valkyrja\Config\Configs\Annotation as Model;

use function Valkyrja\storagePath;

/**
 * Class Annotation.
 */
class Annotation extends Model
{
    /**
     * The annotations map.
     *
     * @example
     * <code>
     *      [
     *         'Annotation' => Annotation::class,
     *      ]
     * </code>
     *
     * @var array
     */
    public array $map = [];

    /**
     * The annotation aliases.
     *
     * @example
     * <code>
     *      [
     *         'Word' => WordEnum::class,
     *      ]
     * </code>
     * Then we can do:
     * <code>
     * @Annotation("name" : "Word::VALUE")
     * </code>
     *
     * @var array
     */
    public array $aliases = [];

    /**
     * Annotation constructor.
     */
    public function __construct()
    {
        parent::__construct(false);

        $this->setEnabled(false);
        $this->setCacheDir(storagePath('framework/annotations'));
        $this->setMap(array_merge(Config::MAP, $this->map));
        $this->setAliases(array_merge(Config::ALIASES, $this->aliases));
    }
}
