<?php

namespace Byteland\Domain\Usecase\Restaurant;

use Byteland\Domain\Repository\Restaurant;

class AddRestaurant
{
    private $restaurantRepo;

    public function __construct(Restaurant $restaurantRepo)
    {
        $this->restaurantRepo = $restaurantRepo;
    }

    public function handle(Restaurant $restaurant)
    {
        return $this->restaurantRepo->add($restaurant);
    }
}