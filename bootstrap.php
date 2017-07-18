<?php

define('BASE_PATH', realpath(dirname(__FILE__)));

/**
 * Define a constant for your view cache directory,
 * this directory will keep all your compiled templates.
 */
define('VIEW_CACHE_PATH', BASE_PATH . '/storage/cache/');

/**
 * Define the path for your views.
 * All view files will be located under this path.
 */
define('VIEW_PATH', BASE_PATH . '/resources/views/');

/**
 * Define the application path,
 * this directory will hold all the necessary code for the
 * application to work.
 */
define('APP_PATH', BASE_PATH . '/app/');

/**
 * Define the web directory path,
 * this directory will contain all your assets
 * and the entry points.
 */
define('WEB_PATH', BASE_PATH . '/web/');

/**
 * Include the composer auto loader
 * Bootstrap the framework.
 */
require_once 'vendor/autoload.php';

$app = \App\Common\App::app();

/**
 * Register application dependencies.
 */
$app->getContainer()->register('loader', \App\Common\Loader::class);

$app->getContainer()->register('blade', Bliss\Blade::class)
    ->addArgument(VIEW_PATH)->addArgument(VIEW_CACHE_PATH);

/**
 * Setup database connection.
 */
ActiveRecord\Config::initialize(function ($config) use ($app) {

    $loader = $app->getContainer()->get('loader');
    $database = $loader->config('database');

    $config->set_model_directory(APP_PATH . 'Models/');
    $config->set_connections([
        'production' => sprintf('mysql://%s:%s@%s/%s',
            $database['username'], $database['password'], $database['hostname'],
            $database['database'])
    ]);

    $config->set_default_connection('production');
});

/**
 * Initialize the router.
 */
$router = new \App\Common\Router($_SERVER['REQUEST_URI']);