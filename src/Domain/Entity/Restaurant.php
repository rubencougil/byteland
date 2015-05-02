<?php

namespace Byteland\Domain\Entity;

class Restaurant {

    private $name;
    private $max;

    public function __construct($name, $max = null)
    {
        $this->name = $name;
        $this->max = $max;
    }

    public function name()
    {
        return $this->name;
    }

    public function max()
    {
        return $this->max;
    }
}