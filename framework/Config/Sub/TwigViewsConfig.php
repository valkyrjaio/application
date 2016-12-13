<?php

/*
 * This file is part of the Valkyrja framework.
 *
 * (c) Melech Mizrachi
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Valkyrja\Config\Sub;

use Valkyrja\Contracts\Application;

/**
 * Class TwigViewsConfig
 *
 * @package Valkyrja\Config\Sub
 */
class TwigViewsConfig
{
    /**
     * Whether twig templating is enabled.
     *
     * @var bool
     */
    public $enabled;

    /**
     * Twig templates directory.
     *
     * @var string
     */
    public $dir;

    /**
     * Twig compiled templates directory.
     *
     * @var string
     */
    public $compiledDir;

    /**
     * Twig extensions.
     *
     * @var array
     */
    public $extensions;

    /**
     * Set defaults?
     *
     * @var bool
     */
    protected $setDefaults = true;

    /**
     * TwigViewsConfig constructor.
     *
     * @param \Valkyrja\Contracts\Application $app
     */
    public function __construct(Application $app)
    {
        if ($this->setDefaults) {
            $env = $app->env();

            $this->enabled = $env::VIEWS_TWIG_ENABLED
                ?? false;
            $this->dir = $env::VIEWS_TWIG_DIR
                ?? $app->resourcesPath('views/twig');
            $this->compiledDir = $env::VIEWS_TWIG_COMPILED_DIR
                ?? $app->storagePath('views/twig');
            $this->extensions = $env::VIEWS_TWIG_EXTENSIONS
                ?? [];
        }
    }
}
