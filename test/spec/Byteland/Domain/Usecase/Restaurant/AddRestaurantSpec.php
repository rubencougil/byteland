<?php

namespace spec\Byteland\Domain\Usecase\Restaurant;

use Byteland\Domain\Entity\Restaurant;
use PhpSpec\ObjectBehavior;
use Byteland\Domain\Repository\Restaurant as RestaurantRepo;
use Prophecy\Argument;

class AddRestaurantSpec extends ObjectBehavior
{
    function let(RestaurantRepo $restaurantRepo)
    {
        $restaurantRepo->beADoubleOf('Byteland\Domain\Repository\Restaurant');
        $this->beConstructedWith($restaurantRepo);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Byteland\Domain\Usecase\Restaurant\AddRestaurant');
    }

    function it_restaurant_exist_throw_exception($restaurantRepo)
    {
        $restaurant = new Restaurant('test_restaurant');

        $restaurantRepo->get($restaurant->name())->willReturn($restaurant);
        $this->shouldThrow('Byteland\Domain\Exception\RestaurantException')->during('handle', [$restaurant]);
    }
}
