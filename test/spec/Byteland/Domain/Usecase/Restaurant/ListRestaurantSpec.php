<?php

namespace spec\Byteland\Domain\Usecase\Restaurant;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ListRestaurantSpec extends ObjectBehavior
{
    function it_is_initializable($restaurantRepo)
    {
        $restaurantRepo->beADoubleOf('Byteland\Domain\Repository\Restaurant');
        $this->beConstructedWith($restaurantRepo);
        $this->shouldHaveType('Byteland\Domain\Usecase\Restaurant\ListRestaurant');
    }
}
