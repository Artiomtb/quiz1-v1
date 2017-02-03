<?php

namespace Model;

/**
 * Class NewsPost
 * @package Model
 */
class NewsPost implements Renderable
{
    protected $body_post = [];

    /**
     * NewsPost constructor.
     * @param $body
     */
    public function __construct($body)
    {
        $this->body_post = $body;
    }

    /**
     * @return string
     */
    public function render()
    {
        $result = '';

        foreach ($this->body_post as $item => $value)
        {
            if ($item == 'title'){
                $result = $result.'<b>'.$value.'</b>'.'</br>';
            }
            else{
                $result = $result.$value.'</br>';
            }
        }

        $result = $result.'<hr>';

        return $result;
    }
}