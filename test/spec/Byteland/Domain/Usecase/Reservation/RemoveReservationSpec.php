<?php

namespace spec\Byteland\Domain\Usecase\Reservation;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RemoveReservationSpec extends ObjectBehavior
{
    function it_is_initializable($reservationRepo)
    {
        $reservationRepo->beADoubleOf('Byteland\Domain\Repository\Reservation');
        $this->beConstructedWith($reservationRepo);
        $this->shouldHaveType('Byteland\Domain\Usecase\Reservation\RemoveReservation');
    }
}
