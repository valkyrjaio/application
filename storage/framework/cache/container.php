<?php return [
    'services' =>
        [
            'Valkyrja\\Contracts\\Annotations\\AnnotationsParser'               =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Annotations\\AnnotationsParser',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        => null,
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Annotations\\AnnotationsParser',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Annotations\\Annotations'                     =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Annotations\\Annotations',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        =>
                        [
                            0 => 'Valkyrja\\Contracts\\Annotations\\AnnotationsParser',
                        ],
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Annotations\\Annotations',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Container\\Annotations\\ContainerAnnotations' =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Container\\Annotations\\ContainerAnnotations',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        =>
                        [
                            0 => 'Valkyrja\\Contracts\\Annotations\\AnnotationsParser',
                        ],
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Container\\Annotations\\ContainerAnnotations',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Events\\Annotations\\ListenerAnnotations'     =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Events\\Annotations\\ListenerAnnotations',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        =>
                        [
                            0 => 'Valkyrja\\Contracts\\Annotations\\AnnotationsParser',
                        ],
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Events\\Annotations\\ListenerAnnotations',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Path\\PathGenerator'                          =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Path\\PathGenerator',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        => null,
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Path\\PathGenerator',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Path\\PathParser'                             =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Path\\PathParser',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        => null,
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Path\\PathParser',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Console\\Console'                             =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Console\\Console',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        =>
                        [
                            0 => 'Valkyrja\\Contracts\\Application',
                            1 => 'Valkyrja\\Contracts\\Path\\PathParser',
                            2 => 'Valkyrja\\Contracts\\Path\\PathGenerator',
                        ],
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Console\\Console',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Console\\Kernel'                              =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Console\\Kernel',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        =>
                        [
                            0 => 'Valkyrja\\Contracts\\Application',
                            1 => 'Valkyrja\\Contracts\\Console\\Console',
                        ],
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Console\\Kernel',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Console\\Input\\Input'                        =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Console\\Input\\Input',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        =>
                        [
                            0 => 'Valkyrja\\Contracts\\Http\\Request',
                            1 => 'Valkyrja\\Contracts\\Console\\Console',
                        ],
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Console\\Input\\Input',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Console\\Output\\OutputFormatter'             =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Console\\Output\\OutputFormatter',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        => null,
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Console\\Output\\OutputFormatter',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Console\\Output\\Output'                      =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Console\\Output\\Output',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        =>
                        [
                            0 => 'Valkyrja\\Contracts\\Console\\Output\\OutputFormatter',
                        ],
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Console\\Output\\Output',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Console\\Annotations\\CommandAnnotations'     =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Console\\Annotations\\CommandAnnotations',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        =>
                        [
                            0 => 'Valkyrja\\Contracts\\Annotations\\AnnotationsParser',
                        ],
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Console\\Annotations\\CommandAnnotations',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Http\\Kernel'                                 =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Http\\Kernel',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        =>
                        [
                            0 => 'Valkyrja\\Contracts\\Application',
                            1 => 'Valkyrja\\Contracts\\Routing\\Router',
                        ],
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Http\\Kernel',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Http\\Request'                                =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Http\\Request',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        => null,
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Http\\Request',
                    'property'            => null,
                    'method'              => 'createFromGlobals',
                    'static'              => true,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Http\\Response'                               =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => null,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Http\\Response',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        => null,
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Http\\Response',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Http\\JsonResponse'                           =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => null,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Http\\JsonResponse',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        => null,
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Http\\JsonResponse',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Http\\RedirectResponse'                       =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => null,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Http\\RedirectResponse',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        => null,
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Http\\RedirectResponse',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Http\\ResponseBuilder'                        =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Http\\ResponseBuilder',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        =>
                        [
                            0 => 'Valkyrja\\Contracts\\Application',
                        ],
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Http\\ResponseBuilder',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Routing\\Router'                              =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Routing\\Router',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        =>
                        [
                            0 => 'Valkyrja\\Contracts\\Application',
                            1 => 'Valkyrja\\Contracts\\Path\\PathParser',
                            2 => 'Valkyrja\\Contracts\\Path\\PathGenerator',
                        ],
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Routing\\Router',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Routing\\Annotations\\RouteAnnotations'       =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Routing\\Annotations\\RouteAnnotations',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        =>
                        [
                            0 => 'Valkyrja\\Contracts\\Annotations\\AnnotationsParser',
                        ],
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Routing\\Annotations\\RouteAnnotations',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\View\\View'                                   =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => null,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\View\\View',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        => null,
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Providers\\TwigServiceProvider',
                    'property'            => null,
                    'method'              => 'getTwigView',
                    'static'              => true,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Http\\Client'                                 =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Http\\Client',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        => null,
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Http\\Client',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Monolog\\Handler\\StreamHandler'                                   =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Monolog\\Handler\\StreamHandler',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        => null,
                    'arguments'           =>
                        [
                            0 => '/var/www/site/storage/logs/valkyrja.log',
                            1 => 'debug',
                        ],
                    'annotationType'      => null,
                    'class'               => 'Monolog\\Handler\\StreamHandler',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Psr\\Log\\LoggerInterface'                                         =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Psr\\Log\\LoggerInterface',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        => null,
                    'arguments'           =>
                        [
                            0 => 'ApplicationLog',
                            1 =>
                                Valkyrja\Dispatcher\Dispatch::__set_state([
                                    'id'                  => null,
                                    'name'                => null,
                                    'closure'             => null,
                                    'dependencies'        => null,
                                    'arguments'           => null,
                                    'annotationType'      => null,
                                    'class'               => 'Valkyrja\\Container\\BootstrapContainer',
                                    'property'            => null,
                                    'method'              => 'getLoggerHandlers',
                                    'static'              => true,
                                    'function'            => null,
                                    'matches'             => null,
                                    'annotationArguments' => null,
                                ]),
                        ],
                    'annotationType'      => null,
                    'class'               => 'Monolog\\Logger',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Logger\\Logger'                               =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Logger\\Logger',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        =>
                        [
                            0 => 'Psr\\Log\\LoggerInterface',
                        ],
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Logger\\Logger',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'App\\Controllers\\HomeController'                                  =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => null,
                    'defaults'            => null,
                    'id'                  => 'App\\Controllers\\HomeController',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        =>
                        [
                            0 => 'Valkyrja\\Contracts\\Application',
                        ],
                    'arguments'           => null,
                    'annotationType'      => 'Service',
                    'class'               => 'App\\Controllers\\HomeController',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Application@App\\Controllers\\HomeController' =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => null,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Application@App\\Controllers\\HomeController',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        =>
                        [
                            0 => 'Valkyrja\\Contracts\\Application',
                        ],
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'App\\Controllers\\HomeController',
                    'property'            => null,
                    'method'              => 'getApplication',
                    'static'              => true,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Twig_Environment'                                                  =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Twig_Environment',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        => null,
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Providers\\TwigServiceProvider',
                    'property'            => null,
                    'method'              => 'getTwigEnvironment',
                    'static'              => true,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            'Valkyrja\\Contracts\\Session\\Session'                             =>
                Valkyrja\Container\Service::__set_state([
                    'singleton'           => true,
                    'defaults'            => null,
                    'id'                  => 'Valkyrja\\Contracts\\Session\\Session',
                    'name'                => null,
                    'closure'             => null,
                    'dependencies'        => null,
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'Valkyrja\\Session\\Session',
                    'property'            => null,
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
        ],
    'aliases'  =>
        [
            'homeController' => 'App\\Controllers\\HomeController',
        ],
];