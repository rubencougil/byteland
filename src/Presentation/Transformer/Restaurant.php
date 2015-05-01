<?php

namespace Byteland\Presentation\Transformer;

use Byteland\Domain\Entity\Restaurant as RestaurantEntity;
use Byteland\Presentation\View\Restaurant as RestaurantView;

class Restaurant
{
    private $restaurant;

    public function transform(RestaurantEntity $restaurant)
    {
        return new RestaurantView($restaurant);
    }

    public function transformList(array $restaurantList)
    {
        return array_map(function($restaurant){
           return self::transform($restaurant);
        }, $restaurantList);
    }

    public function jsonSerialize()
    {
        return [
            'name' => $this->restaurant->name(),
            'max' => $this->restaurant->max()
        ];
    }
}