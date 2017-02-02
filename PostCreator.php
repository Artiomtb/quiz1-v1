<?php

use Exceptions\InvalidPostKeyException;
use Exceptions\ClassNotFoundException;

/**
 * Factory for getting Post from config
 *
 * Class PostCreator
 */
class PostCreator
{
    private static $instance = null;

    const CONFIG_FILE = 'config.php';

    private $config;

    /**
     * PostCreator constructor.
     */
    private function __construct()
    {
        $this->config = require(self::CONFIG_FILE);
//        $this->debug($this->config);
    }

    /**
     * Returns ConfigSingleton unique ex
     *
     * @return PostCreator
     */
    public static function getInstance()
    {
        if (self::$instance === null) 
        {
            self::$instance = new self();
        }

        return self::$instance;

    }

    /**
     * Protects from creation through cloning
     */
    private function __clone(){}

    /**
     * Protects from creation through unserialize
     */
    private function __wakeup(){}

    /**
     * Returns PostObject by its name
     * 
     * @param string $name
     * @param array $params
     * @return mixed
     * @throws ClassNotFoundException
     * @throws InvalidPostKeyException
     */
    public function make(string $name, array $params)
    {
        if (array_key_exists ( $name , $this->config ))
        {
//            $this->debug($this->config[$name]);
            if (class_exists($this->config[$name]))
                return new $this->config[$name]($params);
            else
                throw new ClassNotFoundException("Class " . $name . " is not found!");
        }
        else
            throw new InvalidPostKeyException("Key " . $name . " is incorrect!");
    }
    

    function debug($value)
    {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    }
    
}


