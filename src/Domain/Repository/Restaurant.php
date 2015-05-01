<?php

namespace Byteland\Domain\Repository;

use \Byteland\Domain\Entity\Restaurant as RestaurantEntity;

interface Restaurant
{
    public function get($name);

    public function add(RestaurantEntity $restaurant);

    public function all();

    public function delete($name);
}