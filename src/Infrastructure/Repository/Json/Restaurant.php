<?php

namespace Byteland\Infrastructure\Repository\Json;

use Byteland\Domain\Repository\Restaurant as RestaurantRepository;
use Byteland\Domain\Entity\Restaurant as RestaurantEntity;

class Restaurant implements RestaurantRepository
{
    private $restaurants;
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
        $this->restaurants = json_decode(file_get_contents($path), true);
    }

    public function get($name)
    {
        if (!array_key_exists($name, $this->restaurants))
        {
            return null;
        }

        return new RestaurantEntity(
            $this->restaurants[$name]['name'],
            $this->restaurants[$name]['max']
        );
    }

    public function add(RestaurantEntity $restaurant)
    {
        $this->restaurants[$restaurant->name()] = [
            'name' => $restaurant->name(),
            'max'  => $restaurant->max()
        ];

        $this->persist();

        return $this->get($restaurant->name());
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
        $this->persist();
        return $this->all();
    }

    public function persist()
    {
        file_put_contents($this->path, json_encode($this->restaurants));
    }
}