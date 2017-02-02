<?php

namespace Model;

/**
 * Class BlogPost
 * @package Model
 */
class BlogPost implements Renderable
{
    private $params = [];

    function __construct($params)
    {
        $this->params = $params;
    }

    function render():string
    {
        return implode("  >>  ", $this->params);
    }
}