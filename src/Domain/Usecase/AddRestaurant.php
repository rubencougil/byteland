<?php

namespace Byteland\Domain\Usecase;

use Byteland\Domain\Repository\Restaurant;
use Byteland\Domain\Entity\Restaurant as RestaurantEntity;

class AddRestaurant
{
    private $restaurantRepo;

    public function __construct(Restaurant $restaurantRepo)
    {
        $this->restaurantRepo = $restaurantRepo;
    }

    public function handle(RestaurantEntity $restaurant)
    {
        return $this->restaurantRepo->add($restaurant);
    }
}