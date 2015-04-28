<?php

namespace Byteland\Infrastructure\Repository\Fake;

use Byteland\Domain\Repository\Restaurant as RestaurantRepository;
use Byteland\Domain\Entity\Restaurant as RestaurantEntity;

class Restaurant implements RestaurantRepository
{
    private $restaurants = [
        'bulli' => [
            'name' => 'bulli',
            'max' => 10
        ],
        'annapurna' => [
            'name' => 'annapurna',
            'max' => 20
        ]
    ];

    public function get($name)
    {
        return new RestaurantEntity(
            $this->restaurants[$name]['name'],
            $this->restaurants[$name]['max']
        );
    }

    public function add($name, $max)
    {
        $this->restaurants[$name] = [
            'name' => $name,
            'max'  => $max
        ];

        return $this->get($name);
    }

    public function all()
    {
        return array_map(function($restaurant){
           return new RestaurantEntity($restaurant['name'], $restaurant['max']);
        }, $this->restaurants);
    }

    public function delete($name)
    {
        unset($this->restaurants[$name]);
        return $this->all();
    }
}