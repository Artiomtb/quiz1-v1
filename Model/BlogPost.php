<?php

namespace Model;

/**
 * Class BlogPost
 * @package Model
 */
class BlogPost implements Renderable
{
    protected $body_post = [];

    /**
     * BlogPost constructor.
     * @param $body
     */
    public function __construct($body)
    {
        $this->body_post = $body;
    }

    /**
     * @return string
     */
    public function render() : string
    {
        $result = '';

        foreach ($this->body_post as $item => $value)
        {
            if ($item == 'title'){
                $result .= '<b>'.$value.'</b>'.'</br>';
            }
            else if ($item == 'author'){
                $result .= '<i>'.$value.'</i>'.'</br>';
            }
            else{
                $result .= $value.'</br>';
            }
        }

        return $result .= '<hr>';
    }
}