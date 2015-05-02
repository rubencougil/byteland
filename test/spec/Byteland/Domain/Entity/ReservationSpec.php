<?php

namespace spec\Byteland\Domain\Entity;

use Byteland\Domain\Entity\Client;
use Byteland\Domain\Entity\Restaurant;
use Byteland\Domain\ValueObject\Date;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReservationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(
            new Restaurant('test_restaurant'),
            new Client('test_client'),
            new Date('01/01/2015')
        );
        $this->shouldHaveType('Byteland\Domain\Entity\Reservation');
    }
}
