<?php

namespace Byteland\Domain\Usecase\Restaurant;

use Byteland\Domain\Repository\Restaurant;

class RemoveRestaurant
{
    private $restaurantRepo;

    public function __construct(Restaurant $restaurantRepo)
    {
        $this->restaurantRepo = $restaurantRepo;
    }

    public function handle($name)
    {
        return $this->restaurantRepo->delete($name);
    }
}