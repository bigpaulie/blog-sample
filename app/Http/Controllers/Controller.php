<?php

namespace App\Http\Controllers;

use App\common\App;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
abstract class Controller
{
    /**
     * This method is mandatory for all controllers
     * and will be the default method to be called
     * if we can't find a proper URL.
     *
     * @return mixed
     */
    public abstract function index();

    /**
     * Render a template.
     *
     * @param $view
     * @param array $data
     * @return mixed
     */
    public final function render($view, $data = [])
    {
        $blade = App::app()->getContainer()->get('blade');
        return $blade->render($view, $data);
    }
}