<?php

use Valkyrja\Support\Directory;

/*
 *-------------------------------------------------------------------------
 * Views Configuration
 *-------------------------------------------------------------------------
 *
 * Views are what provide users with something to look at and enjoy all
 * the hard work you've put into the application. Here you'll find
 * all the configurations necessary to make that work properly.
 *
 */
return [
    /*
     *-------------------------------------------------------------------------
     * Views Directory
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    'dir' => env()::VIEWS_DIR ?? Directory::resourcesPath('views'),
];
