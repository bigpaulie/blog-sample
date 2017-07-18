<?php

namespace App\common;

use App\common\Loader;
use \Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class App
 * @package App\common
 */
class App
{

    /**
     * Tha App instance.
     * @var App $instance
     */
    private static $instance = null;

    /**
     * Dependency injection container.
     * @var ContainerBuilder $container
     */
    private $container;

    /**
     * App constructor.
     */
    private function __construct()
    {
        $this->container = new ContainerBuilder();
    }

    /**
     * The application singleton.
     * @return App
     */
    public static function app()
    {

        if ( !self::$instance ) {
            self::$instance = new App();
        }

        return self::$instance;
    }

    /**
     * Container getter.
     * @return ContainerBuilder
     */
    public function getContainer()
    {
        return $this->container;
    }
}