<?php
use Model\Post;
use Model\Config;
use Exceptions\ClassNotFoundException;
use Exceptions\FieldNotFoundException;
use Exceptions\InvalidPostKeyException;

/**
 * Factory of Posts. It gets Post or Post-child class from config setting.
 *
 * Class PostCreator
 */
class PostCreator
{
    /**
     * Instance of PostCreator Class
     *
     * @var PostCreator
     */
    private static $instance;

    /**
     * Array of config
     *
     * @var array
     */
    private $config;

    /**
     * PostCreator constructor.
     */
    public function __construct()
    {
        $this->config = Config::getConfig();
    }

    /**
     * @param string $classKey
     * @param array $params
     * @return Post
     * @throws ClassNotFoundException
     * @throws FieldNotFoundException
     * @throws InvalidPostKeyException
     */
    public function make(string $classKey, array $params): Post
    {
        if (array_key_exists($classKey, $this->config)) {

            $class = $this->config[$classKey];

            if (class_exists($class)) {

                // Gets all field of the class and the parents classes
                $classFields = $class::expose();

                foreach ($params as $key => $param) {

                    if (! array_key_exists($key, $classFields)) {

                        //Error: The field '{$key}' of class '{$class}' does not exist
                        throw new FieldNotFoundException("Error: The field '{$key}' of class '{$class}' does not exist");
                    }

                }

            } else {
                // Error: The class '{$className}' does not exist
                throw new ClassNotFoundException("Error: The class '{$classKey}' does not exist");
            }

        } else {
            // Error: The key '{$classKey}' does not exist in the config-file
            throw new InvalidPostKeyException("Error: The key '{$classKey}' does not exist in the config-file");
        }

        return new $class($params);
    }

    /**
     * Returns instance of PostCreator
     *
     * @return PostCreator
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {

            self::$instance = new PostCreator();
        }

        return self::$instance;
    }

    /**
     * It is must leave empty
     */
    private function __clone()
    {
        // must leave empty
    }

    /**
     * It is must leave empty
     */
    private function __wakeup()
    {
        // must leave empty
    }
}