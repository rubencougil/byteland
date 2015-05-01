<?php

namespace Byteland\Presentation\Transformer;

use Byteland\Domain\Entity\Restaurant as RestaurantEntity;

class Restaurant implements \JsonSerializable
{
    private $restaurant;

    public function transform(RestaurantEntity $restaurant)
    {
        $this->restaurant = $restaurant;
        return $this;
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