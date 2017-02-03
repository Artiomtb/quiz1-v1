<?php

use Exceptions\InvalidPostKeyException;
use Exceptions\ClassNotFoundException;

/**
 * Class PostCreator
 * @package Model
 */
class PostCreator
{
    private static $instance = null;
    private $config;

    /**
     * PostCreator constructor
     */
    private function __construct()
    {
        $this->config = include ("config.php");
    }

    /**
     * @return PostCreator global instance of the creator (Singleton)
     */
    public static function getInstance(): PostCreator
    {
        //check if initialized
        if (self::$instance == null) {
            //init
            self::$instance = new PostCreator();
        }

        return self::$instance;

    }

    /**
     * @param string $name
     * @param array $params
     * @return Model\Renderable
     * @throws ClassNotFoundException
     * @throws InvalidPostKeyException
     */
    public function make(string $name, $params): \Model\Renderable
    {
        $classPath = $this->config[$name];

        if(!array_key_exists($name, $this->config)){
            throw new InvalidPostKeyException();
        }

        if(!class_exists($classPath)){
            throw new ClassNotFoundException();
        }

        return new $classPath($name, $params);
    }
}