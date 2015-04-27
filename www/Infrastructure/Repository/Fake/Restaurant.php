<?php

namespace Byteland\Infrastructure\Repository\Fake;

use Byteland\Domain\Repository\Restaurant as RestaurantRepository;
use Byteland\Domain\Entity\Restaurant as RestaurantEntity;

class Restaurant implements RestaurantRepository
{
    private $restaurants = [
        'bulli' => [
            'name' => 'bulli',
            'city' => 'barcelona'
        ],
        'annapurna' => [
            'name' => 'annapurna',
            'city' => 'london'
        ]
    ];

    public function get($name)
    {
        return new RestaurantEntity($this->restaurants[$name]['name']);
    }
}