<?php

namespace Byteland\Presentation\View;

use Byteland\Domain\Entity\Restaurant as RestaurantEntity;

class Restaurant implements \JsonSerializable
{
    private $restaurant;

    public function __construct(RestaurantEntity $restaurant)
    {
        $this->restaurant = $restaurant;
        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'name' => $this->restaurant->name(),
            'max' => $this->restaurant->max()
        ];
    }
}