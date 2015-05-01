<?php

namespace Byteland\Domain\Usecase;

use Byteland\Domain\Repository\Restaurant;

class AddRestaurant
{
    private $restaurantRepo;

    public function __construct(Restaurant $restaurantRepo)
    {
        $this->restaurantRepo = $restaurantRepo;
    }

    public function handle($name, $max)
    {
        return $this->restaurantRepo->add($name, $max);
    }
}