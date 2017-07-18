<?php

/**
 * Bootstrap the framework.
 */
require_once '../bootstrap.php';

/**
 * Require some helpers.
 */
require_once APP_PATH . 'Helpers/Config.php';
require_once APP_PATH . 'Helpers/File.php';
require_once APP_PATH . 'Helpers/Url.php';

/**
 * Display the current route.
 */
echo $router->route();