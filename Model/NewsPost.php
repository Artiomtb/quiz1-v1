<?php

namespace Model;

/**
 * Class NewsPost
 * @package Model
 */
class NewsPost implements Renderable
{
    private $params = [];

    function __construct($params)
    {
        $this->params = $params;
    }

    function render():string
    {
        return ('<h2>' . $this->params["title"] . '<h3>' . $this->params["content"]);
    }
}