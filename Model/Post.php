<?php
namespace Model;

abstract class Post implements Renderable
{
    protected $options;

  function __construct(array $options)
  {
      $this->options = $options;
  }

}