<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 01.02.17
 * Time: 19:57
 */
use Exceptions\ClassNotFoundException;
use Exceptions\InvalidPostKeyException;

class PostCreator
{

  public function  __construct()
  {

  }

  private function  __clone()
  {

  }

    private static $instance = null;

    static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    static function make(string $className,array $options):Model\Renderable
    {
        $namespacePaths = include 'config.php';

        if(array_key_exists($className, $namespacePaths)){
            if(class_exists($namespacePaths[$className])) {
                return new $namespacePaths[$className]($options);
            } else {
                throw new ClassNotFoundException();
            }
        } else {
            throw new InvalidPostKeyException();
        }
    }
}
