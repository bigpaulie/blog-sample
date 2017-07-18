<?php

/**
 * If the config function is not already defined,
 * define it now .
 */
if ( !function_exists('config') ) {

    /**
     * Get a configuration array
     * @param string $key
     * @return mixed
     */
    function config($key)
    {
        $loader = \App\common\App::app()->getContainer()->get('loader');
        return $loader->config($key);
    }
}