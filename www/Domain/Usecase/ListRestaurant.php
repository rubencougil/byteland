<?php

namespace Byteland\Domain\Usecase;

use Byteland\Domain\Repository\Restaurant;

class ListRestaurant
{
    private $restaurantRepo;

    public function __construct(Restaurant $restaurantRepo)
    {
        $this->restaurantRepo = $restaurantRepo;
    }

    public function handle()
    {
        return $this->restaurantRepo->all();
    }
}