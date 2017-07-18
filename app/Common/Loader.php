<?php

namespace App\Common;

use App\Exceptions\FileNotFoundException;

class Loader
{
    /**
     * Load configuration file
     * @param string $key filename
     * @return array
     * @throws FileNotFoundException
     */
    public function config($key)
    {

        if ( !file_exists( APP_PATH . 'Config/' . $key . '.php') ) {
            throw new FileNotFoundException(sprintf('Unable to locate %s.php', $key));
        }

        return include APP_PATH . '/Config/' . $key . '.php';

    }
}