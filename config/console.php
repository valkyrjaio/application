<?php

use Valkyrja\Support\Directory;

/*
 *-------------------------------------------------------------------------
 * Console Configuration
 *-------------------------------------------------------------------------
 *
 * The console is Valkyrja's module for working with the application
 * through the CLI. All the configurations necessary to make that
 * work can be found here.
 *
 */
return [
    /*
     *-------------------------------------------------------------------------
     * Console Use Annotations
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'useAnnotations'            => env()::CONSOLE_USE_ANNOTATIONS ?? false,

    /*
     *-------------------------------------------------------------------------
     * Console Use Annotations Exclusively
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'useAnnotationsExclusively' => env()::CONSOLE_USE_ANNOTATIONS_EXCLUSIVELY ?? false,

    /*
     *-------------------------------------------------------------------------
     * Console Handlers
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'handlers'                  => env()::CONSOLE_HANDLERS ?? [],

    /*
     *-------------------------------------------------------------------------
     * Console File Path
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'filePath'                  => env()::CONSOLE_FILE_PATH ?? Directory::bootstrapPath('commands.php'),

    /*
     *-------------------------------------------------------------------------
     * Console Cache File Path
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'cacheFilePath'             => env()::CONSOLE_CACHE_FILE_PATH ?? Directory::cachePath('commands.php'),

    /*
     *-------------------------------------------------------------------------
     * Console Use Cache File
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'useCacheFile'              => env()::CONSOLE_USE_CACHE_FILE ?? true,
];
