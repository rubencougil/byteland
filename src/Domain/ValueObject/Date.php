<?php

namespace Byteland\Domain\ValueObject;

class Date
{
    private $date;

    public function __construct($date)
    {
        $this->date = $date;
    }

    public function date()
    {
        return $this->date;
    }
}