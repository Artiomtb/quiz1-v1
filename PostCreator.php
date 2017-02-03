<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 01.02.17
 * Time: 19:57
 */

class PostCreator {

  public function  __construct() {
  }

    private static $instance = null;

    public function getInstance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function make(string $className,array $options):Model\Renderable {
        $namespacePaths = include 'config.php';
        if(array_key_exists($className,$namespacePaths)){
            if(class_exists($namespacePaths[className])) {
                return new $namespacePaths[className]($options);
            } else {
                throw new ClassNotFoundException;
            }
        } else {
            throw new InvalidPostKeyException();
        }
    }
}
