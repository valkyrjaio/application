<?php

namespace App\Providers;

use Twig_Environment;
use Twig_Loader_Filesystem;
use Valkyrja\Container\Service;
use Valkyrja\Contracts\View\View;
use Valkyrja\Support\Directory;
use Valkyrja\Support\ServiceProvider;
use Valkyrja\View\TwigView;

/**
 * Class TwigServiceProvider.
 */
class TwigServiceProvider extends ServiceProvider
{
    /**
     * What services are provided.
     *
     * @var array
     */
    public static $provides = [
        Twig_Environment::class,
        View::class,
    ];

    /**
     * Publish the service provider.
     *
     * @throws \Twig_Error_Loader
     *
     * @return void
     */
    public function publish(): void
    {
        $this->app->config()['view']['twig'] = require Directory::configPath('twig-views.php');

        $this->bindTwigEnvironment();
        $this->bindTwigView();
    }

    /**
     * Bind the twig environment to the container.
     *
     * @throws \Twig_Error_Loader
     *
     * @return void
     */
    protected function bindTwigEnvironment(): void
    {
        // Get the twig filesystem loader
        $loader = new Twig_Loader_Filesystem();

        // Iterate through the dirs and add each as a path in the twig loader
        foreach ($this->app->config()['view']['twig']['dirs'] as $namespace => $dir) {
            $loader->addPath($dir, $namespace);
        }

        // Create a new twig environment
        $twig = new Twig_Environment(
            $loader,
            [
                'cache'   => $this->app->config()['view']['twig']['compiledDir'],
                'debug'   => $this->app->debug(),
                'charset' => 'utf-8',
            ]
        );

        // Iterate through the extensions
        foreach ($this->app->config()['view']['twig']['extensions'] as $extension) {
            // And add each extension to the twig environment
            $twig->addExtension(new $extension());
        }

        // Set the twig environment as a singleton in the container
        $this->app->container()->singleton(
            Twig_Environment::class,
            $twig
        );
    }

    /**
     * Bind the twig view as the view in the container.
     *
     * @return void
     */
    protected function bindTwigView(): void
    {
        $this->app->container()->bind(
            (new Service())
                ->setId(View::class)
                ->setClass(static::class)
                ->setMethod('getTwigView')
                ->setStatic(true)
        );
    }

    /**
     * Get the twig view when building a service container item.
     *
     * @param string $template  The template
     * @param array  $variables The variables
     *
     * @return \Valkyrja\View\TwigView
     */
    public static function getTwigView($template = '', array $variables = []): TwigView
    {
        $view = new TwigView(app(), $template, $variables);

        $view->setTwig(container()->get(Twig_Environment::class));

        return $view;
    }
}
