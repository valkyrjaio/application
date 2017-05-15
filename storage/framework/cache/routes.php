<?php return [
    'routes'        =>
        [
            '/'         =>
                Valkyrja\Routing\Route::__set_state([
                    'path'                => '/',
                    'requestMethods'      =>
                        [
                            0 => 'GET',
                            1 => 'HEAD',
                        ],
                    'regex'               => null,
                    'params'              => null,
                    'segments'            => null,
                    'dynamic'             => false,
                    'secure'              => false,
                    'id'                  => null,
                    'name'                => 'welcome',
                    'closure'             => null,
                    'dependencies'        => null,
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'App\\Controllers\\HomeController',
                    'property'            => null,
                    'method'              => 'welcome',
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            '/version'  =>
                Valkyrja\Routing\Route::__set_state([
                    'path'                => '/version',
                    'requestMethods'      =>
                        [
                            0 => 'GET',
                            1 => 'HEAD',
                        ],
                    'regex'               => null,
                    'params'              => null,
                    'segments'            => null,
                    'dynamic'             => false,
                    'secure'              => false,
                    'id'                  => null,
                    'name'                => 'version',
                    'closure'             => null,
                    'dependencies'        => null,
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'App\\Controllers\\HomeController',
                    'property'            => null,
                    'method'              => 'version',
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
            '/property' =>
                Valkyrja\Routing\Route::__set_state([
                    'path'                => '/property',
                    'requestMethods'      =>
                        [
                            0 => 'GET',
                            1 => 'HEAD',
                        ],
                    'regex'               => null,
                    'params'              => null,
                    'segments'            => null,
                    'dynamic'             => false,
                    'secure'              => false,
                    'id'                  => null,
                    'name'                => 'property',
                    'closure'             => null,
                    'dependencies'        => null,
                    'arguments'           => null,
                    'annotationType'      => null,
                    'class'               => 'App\\Controllers\\HomeController',
                    'property'            => 'propertyRouting',
                    'method'              => null,
                    'static'              => null,
                    'function'            => null,
                    'matches'             => null,
                    'annotationArguments' => null,
                ]),
        ],
    'staticRoutes'  =>
        [
            '/'         => true,
            '/version'  => true,
            '/property' => true,
        ],
    'dynamicRoutes' =>
        [
        ],
    'namedRoutes'   =>
        [
            'welcome'  => '/',
            'version'  => '/version',
            'property' => '/property',
        ],
];