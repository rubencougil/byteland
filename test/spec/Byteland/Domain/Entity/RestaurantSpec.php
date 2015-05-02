<?php

namespace spec\Byteland\Domain\Entity;

use Byteland\Domain\Entity\Restaurant;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RestaurantSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $restaurant = new Restaurant('test_restaurant');
        $this->beConstructedWith($restaurant);
        $this->shouldHaveType('Byteland\Domain\Entity\Restaurant');
    }
}
