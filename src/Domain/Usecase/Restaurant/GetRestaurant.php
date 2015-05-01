<?php

namespace Byteland\Domain\Usecase\Restaurant;

use Byteland\Domain\Repository\Restaurant;

class GetRestaurant
{
    private $restaurantRepo;

    public function __construct(Restaurant $restaurantRepo)
    {
        $this->restaurantRepo = $restaurantRepo;
    }

    public function handle($name)
    {
        return $this->restaurantRepo->get($name);
    }
}