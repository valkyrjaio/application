<?php

/**
 * Valkyrja - PHP framework.
 *
 * @author Melech Mizrachi
 */

// Set a global constant for when the application as a whole started
define('APP_START', microtime(true));

/*
 *-------------------------------------------------------------------------
 * Composer Auto Loader Assemble!
 *-------------------------------------------------------------------------
 *
 * Autoload all the application namespaces, dependencies, and files using
 * composer to both manage all dependencies as well as register everything
 * for us to use within the application.
 *
 */

require_once __DIR__ . '/../vendor/autoload.php';

/*
 *-------------------------------------------------------------------------
 * Set The Base Directory
 *-------------------------------------------------------------------------
 *
 * Let's set the base directory within the web server for our application
 * so that when we locate directories and files within the application
 * we have a standard location from which to do so.
 *
 */

Valkyrja\Support\Directory::$BASE_PATH = realpath(__DIR__ . '/../');

/*
 *-------------------------------------------------------------------------
 * Setup The Application
 *-------------------------------------------------------------------------
 *
 * Let's setup the application by bootstrapping it. This will instantiate
 * the main application as well as add any required classes to the
 * service container, add environment variables, add config
 * variables, and add all the application routes.
 *
 */

$config = require \Valkyrja\Support\Directory::configPath('config.php');

Valkyrja\Application::env(config\Env::class);

/*
 *-------------------------------------------------------------------------
 * Start Up The Application
 *-------------------------------------------------------------------------
 *
 * Let's start up the application by creating a new instance of the
 * application class. This is going to bind all the various
 * components together into a singular hub.
 *
 */

$app = new Valkyrja\Application($config);

/*
 *-------------------------------------------------------------------------
 * Run The Application
 *-------------------------------------------------------------------------
 *
 * Now that the application has been bootstrapped and setup correctly
 * with all our requirements lets run it!
 *
 */

$app->kernel()->run();
