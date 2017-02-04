<?php
namespace Model;

/**
 * Class Config
 * @package Model
 */
class Config
{
    /**
     * Instance if Config
     *
     * @var Config
     */
    private static $instance;

    /**
     * Array of config setting
     *
     * @var array
     */
    private static $config;

    /**
     * Constructs config setting from the file - config.php
     *
     * Config constructor
     */
    public function __construct()
    {
        self::$config = require 'config.php';
    }

    /**
     * Returns instance of Config class
     *
     * @return Config
     */
    static function getInstance()
    {
        if (self::$instance === null) {

            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Returns array of config setting
     *
     * @return array
     */
    public static function getConfig(): array
    {
        if (self::$instance === null) {
            self::getInstance();
        }
        return self::$config;
    }

    /**
     * @param array $config
     */
    public static function setConfig(array $config)
    {
        self::$config = $config;
    }

    /**
     * It is must leave empty
     */
    private function __wakeup()
    {
        //must leave empty
    }

    /**
     * It is must leave empty
     */
    private function __clone()
    {
        //must leave empty
    }
}
