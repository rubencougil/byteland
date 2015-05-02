<?php

namespace Byteland\Domain\Usecase\Restaurant;

use Byteland\Domain\Exception\RestaurantException;
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
        $this->checkRestaurant($restaurant);

        return $this->restaurantRepo->add($restaurant);
    }

    public function checkRestaurant(RestaurantEntity $restaurant)
    {
        if ($this->restaurantRepo->get($restaurant->name())) {
            throw new RestaurantException("Restaurant {$restaurant->name()} already exists");
        }
    }
}