<?php

/**
 * If the assets function is not already defined,
 * define it now.
 */
if ( !function_exists('assets') ) {

    /**
     * Get the full URL of a file.
     *
     * @param string $file
     * @return string
     * @throws \App\Exceptions\FileNotFoundException
     */
    function assets($file) {

        if ( !file_exists(WEB_PATH . $file) ) {
            throw new \App\Exceptions\FileNotFoundException(
                sprintf('Unable to locate file %s', $file)
            );
        }

        $config = config('app');
        return $config['base_url'] . '/' . $file;
    }
}