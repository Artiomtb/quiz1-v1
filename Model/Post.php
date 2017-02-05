<?php


namespace Model;

/**
 * Post
 *
 * Class Post
 * @package Model
 */
abstract class Post implements Renderable
{


    protected $data = [];

    /**
     * Post constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }


    /**
     * @inheritdoc
     */
    public function render(): string
    {
        $result = '';
        foreach ($this->data as $key => $value) {
            $result .= "$key: $value<br>";
        }

        return $result;

    }


}