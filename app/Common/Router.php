<?php

namespace App\Common;


use App\Exceptions\FileNotFoundException;
use App\Exceptions\RouteNotFoundException;

/**
 * Class Router
 * @package App\Common
 */
class Router
{

    /**
     * The current URI
     * @var null|string $url
     */
    private $url = null;

    /**
     * The current URI segments
     * @var array
     */
    private $segments = [];

    /**
     * The current controller.
     *
     * @var null|string
     */
    private $controller = null;

    /**
     * The current callable method.
     *
     * @var null|string
     */
    private $method = null;

    /**
     * Router constructor.
     * @param $url
     */
    public function __construct($url)
    {

        $this->url = $url;
        $this->segments = $this->getSegments();

    }

    /**
     * Get the current requests segments.
     *
     * @return array
     */
    protected function getSegments()
    {

        $url = preg_replace('/^\//i', '', $this->url);
        return explode('/', $url);

    }

    /**
     * Locate the appropriate controller for this request.
     *
     * @throws FileNotFoundException
     */
    protected function getController()
    {

        if ( isset($this->segments[0]) && $this->segments[0] != '' ) {

            $file = APP_PATH . '/Http/Controllers/' .
                ucfirst($this->segments[0]) . 'Controller.php';

            if ( !file_exists($file) ) {

                throw new FileNotFoundException('Page not found !', 404);

            } else {
                $this->controller = $this->segments[0];
            }

        } else {
            $this->controller = 'default';
        }
    }

    /**
     * Find the callable method for this request.
     *
     * @throws RouteNotFoundException
     */
    protected function getMethod()
    {

        if ( isset($this->segments[1]) && $this->segments[1] != '' ) {

            $file = 'App\\Http\\Controllers\\' .
                ucfirst($this->segments[0]) . 'Controller';

            if ( method_exists(new $file, $this->segments[1]) ) {

                $this->method = $this->segments[1];

            } else {

                throw new RouteNotFoundException('Page not found !', 404);
            }

        } else {

            $this->method = 'index';
        }
    }

    /**
     * Route the request.
     * @return mixed
     */
    public function route()
    {

        $this->getController();
        $this->getMethod();

        $class = 'App\\Http\\Controllers\\' . ucfirst($this->controller) . 'Controller';
        $route = new $class;

        if ( isset($this->segments[2]) ) {

            return $route->{$this->method}($this->segments[2]);
        }

        return $route->{$this->method}();

    }
}