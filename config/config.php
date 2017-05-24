<?php

/*
 *-------------------------------------------------------------------------
 * Application Configurations
 *-------------------------------------------------------------------------
 *
 * We'll need to run the application somehow, and so we'll need certain
 * configuration settings in order to set everything up correctly,
 * and appropriately. Here we have all the configurations for
 * the application, including configurations for each module
 * included in the framework.
 *
 */
return [
    /*
     *-------------------------------------------------------------------------
     * Application Configuration
     *-------------------------------------------------------------------------
     *
     * This part of the configuration has to do with the base configuration
     * settings for the application as a whole.
     *
     */
    'app'         => [],

    /*
     *-------------------------------------------------------------------------
     * Annotations Configuration
     *-------------------------------------------------------------------------
     *
     * Anything and everything to do with annotations and how they are
     * configured to work within the application can be found here.
     *
     */
    'annotations' => [],

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
    'console'     => [],

    /*
     *-------------------------------------------------------------------------
     * Container Configuration
     *-------------------------------------------------------------------------
     *
     * The container is the go to place for any type of service the
     * application may need when it is running. All configurations
     * necessary to make it run correctly can be found here.
     *
     */
    'container'   => [],

    /*
     *-------------------------------------------------------------------------
     * Events Configuration
     *-------------------------------------------------------------------------
     *
     * Events are a nifty way to tie into certain happenings throughout the
     * application. Found here are all the configurations required to make
     * events work without a hitch.
     *
     */
    'events'      => [],

    /*
     *-------------------------------------------------------------------------
     * Filesystem Configuration
     *-------------------------------------------------------------------------
     *
     * How the application stores, retrieves, copies, and manipulates files
     * across the filesystem it is located within is a necessity in most
     * applications. Configure that manipulative module here.
     *
     */
    'filesystem'  => [],

    /*
     *-------------------------------------------------------------------------
     * Logger Configuration
     *-------------------------------------------------------------------------
     *
     * Logging is very helpful in understanding what occurs within your
     * application when its deployed and used by multiple users aside
     * from you and your developers. Configure that helpfulness here.
     *
     */
    'logger'      => [],

    /*
     *-------------------------------------------------------------------------
     * Routing Configuration
     *-------------------------------------------------------------------------
     *
     * A pretty big part of getting a user what they've requested is being
     * able to properly route a request through your application. In
     * order to do that you'll need to configure it. Lucky for you
     * all the configurations for routing can be found here.
     *
     */
    'routing'     => [],

    /*
     *-------------------------------------------------------------------------
     * Session Configuration
     *-------------------------------------------------------------------------
     *
     * You'll need to keep track of some stuff across requests, and that's
     * where the session comes in handy. Here you'll find all necessary
     * configurations to make the session work properly.
     *
     */
    'session'     => [],

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
    'storage'     => [],

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
    'views'       => [],
];
