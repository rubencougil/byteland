<?php

namespace Byteland\Domain\Repository;

interface Restaurant
{
    public function get($name);

    public function add($name, $max);

    public function all();

    public function delete($name);
}