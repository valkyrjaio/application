<?php return array (
  'commands' => 'YTowOnt9',
  'paths' => 
  array (
    '/^config:cache$/' => 'config:cache',
    '/^cache:all(?: (-s|--sync))?$/' => 'cache:all[ {sync:-s|--sync}]',
    '/^(?:commands)?(?: ([a-zA-Z0-9]+))?$/' => '[commands][ {namespace:[a-zA-Z0-9]+}]',
    '/^console:cache$/' => 'console:cache',
    '/^console:commandsForBash valkyrja(?: ([a-zA-Z0-9\\:]+))?$/' => 'console:commandsForBash valkyrja[ {commandTyped:[a-zA-Z0-9\\:]+}]',
    '/^optimize$/' => 'optimize',
    '/^container:cache$/' => 'container:cache',
    '/^events:cache$/' => 'events:cache',
    '/^routes:cache$/' => 'routes:cache',
    '/^routes:list$/' => 'routes:list',
  ),
  'namedCommands' => 
  array (
    'config:cache' => 'config:cache',
    'cache:all' => 'cache:all[ {sync:-s|--sync}]',
    'commands' => '[commands][ {namespace:[a-zA-Z0-9]+}]',
    'console:cache' => 'console:cache',
    'console:commandsForBash' => 'console:commandsForBash valkyrja[ {commandTyped:[a-zA-Z0-9\\:]+}]',
    'optimize' => 'optimize',
    'container:cache' => 'container:cache',
    'events:cache' => 'events:cache',
    'routes:cache' => 'routes:cache',
    'routes:list' => 'routes:list',
  ),
  'provided' => 
  array (
      'config:cache' => 'Valkyrja\\Config\\Commands\\ConfigCacheCommand',
      'cache:all[ {sync:-s|--sync}]' => 'Valkyrja\\Console\\Commands\\CacheAllCommand',
      '[commands][ {namespace:[a-zA-Z0-9]+}]' => 'Valkyrja\\Console\\Commands\\CommandsListCommand',
      'console:cache' => 'Valkyrja\\Console\\Commands\\ConsoleCacheCommand',
      'console:commandsForBash valkyrja[ {commandTyped:[a-zA-Z0-9\\:]+}]' => 'Valkyrja\\Console\\Commands\\CommandsListForBashCommand',
      'optimize' => 'Valkyrja\\Console\\Commands\\OptimizeCommand',
      'container:cache' => 'Valkyrja\\Container\\Commands\\ContainerCacheCommand',
      'events:cache' => 'Valkyrja\\Events\\Commands\\EventsCacheCommand',
      'routes:cache' => 'Valkyrja\\Routing\\Commands\\RoutesCacheCommand',
      'routes:list' => 'Valkyrja\\Routing\\Commands\\RoutesListCommand',
  ),
);