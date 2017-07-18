<?php

/**
 * If the url function is not already defined,
 * define it now.
 */
if ( !function_exists('url') ) {

    /**
     * Get the full URL.
     *
     * @param string $url
     * @return string
     */
    function url($url) {

        $config = config('app');
        return $config['base_url'] . '/' . $url;
    }
}