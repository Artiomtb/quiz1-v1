<?php

/**
 * Class PostCreator
 */
class PostCreator
{

    /**
     * @var object $instance instance of PostCreator
     * @var array $ns namespace paths for different post classes
     */
    protected static $instance;
    private $ns;

    /**
     * PostCreator constructor.
     */
    private function __construct()
    {
        $this->ns = include 'config.php';
    }

    /**
     * PostCreator clone method. Empty for Singleton.
     */
    private function __clone()
    {
    }

    /**
     * Returns or creates an instance of PostCreator
     * @return object $instance PostCreator
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Creates a post with specified parameters
     * @param string $post_type type of a post
     * @param array $content post content
     * @return object \Model\BlogPost|\Model\NewsPost specified post
     */
    public function make(string $post_type, array $content)
    {
        switch ($post_type) {
            case 'BlogPost':
                $post = new Model\BlogPost();
                foreach($content as $key => $value) {
                    $post->{$key} = $value;
                }

                break;

            case 'NewsPost':
                $post = new Model\NewsPost();
                foreach($content as $key => $value) {
                    $post->{$key} = $value;
                }

                break;
        }

        return $post;
    }

}