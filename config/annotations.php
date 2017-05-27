<?php

use Valkyrja\Support\Directory;

/*
 *-------------------------------------------------------------------------
 * Annotations Configuration
 *-------------------------------------------------------------------------
 *
 * Anything and everything to do with annotations and how they are
 * configured to work within the application can be found here.
 *
 */
return [
    /*
     *-------------------------------------------------------------------------
     * Annotations Enabled
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'enabled'  => env()::ANNOTATIONS_ENABLED ?? false,

    /*
     *-------------------------------------------------------------------------
     * Annotations Cache Dir
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'cacheDir' => env()::ANNOTATIONS_CACHE_DIR ?? Directory::storagePath('vendor/annotations'),

    /*
     *-------------------------------------------------------------------------
     * Annotations Map
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'map'      => env()::ANNOTATIONS_MAP ?? [],
];
