<?php

namespace Project\Core\Patterns;

trait Singleton
{

    use Base;
    protected static $instance = null;

    public static function getInstance()
    {
        return (null === static::$instance) ? static::$instance = new static : static::$instance;
    }
}