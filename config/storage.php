<?php

use Valkyrja\Support\Directory;

/*
 *-------------------------------------------------------------------------
 * Storage Configuration
 *-------------------------------------------------------------------------
 *
 * Storage is a necessity when working with any kind of data, whether
 * that be user data, or just application data, there needs to be a
 * place to put all of it. Here you'll find all the configurations
 * that setup the storage of all the things.
 *
 */
return [
    /*
     *-------------------------------------------------------------------------
     * Storage Use Trailing Slash
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'uploadsDir' => env()::STORAGE_UPLOADS_DIR ?? Directory::storagePath('app'),
];
