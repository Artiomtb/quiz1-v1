<?php

namespace Model;


/**
 * Class AbstractPost
 *
 * Abstract class to any post
 *
 * @package Model
 */
abstract class AbstractPost implements Renderable
{
    /**
     * @var array $data infortion for render post
     */
    protected $data = array();

    /**
     * AbstractPost constructor.
     * @param array $data
     */

    public function __construct(array $data)
    {
        $this->data = $data;
    }
}