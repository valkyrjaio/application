<?php

/*
 * This file is part of the Valkyrja framework.
 *
 * (c) Melech Mizrachi
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
