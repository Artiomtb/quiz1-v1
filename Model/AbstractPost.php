<?php

namespace Model;

use Model\Renderable;

/**
 * Class AbstractPost
 * @package Model
 */
abstract class AbstractPost implements Renderable
{
    private $params;
    private $name;

    /**
     * AbstractPost constructor.
     * @param string $nameIn
     * @param array $paramsIn
     */
    public function __construct(string $nameIn, $paramsIn)
    {
        $this->name = $nameIn;
        $this->params = $paramsIn;
    }

    /**
     * @return string html page of posts
     */
    public function render(): string
    {
        $returnResult = "Post: " . $this->name . ";  Parameters: <br>";
        foreach ($this->params as $paramName => $param) {
            $returnResult .= $paramName . " : " . $param . "<br>";
        }
        return $returnResult;
    }
}