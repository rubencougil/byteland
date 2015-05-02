<?php

namespace Byteland\Domain\Usecase\Reservation;

use Byteland\Domain\Entity\Reservation;
use Byteland\Domain\Repository\Reservation as ReservationRepo;

class AddReservation
{
    private $reservationRepo;

    public function __construct(
        ReservationRepo $reservationRepo
    )
    {
        $this->reservationRepo = $reservationRepo;
    }

    public function handle(Reservation $reservation)
    {
        return $this->reservationRepo->add($reservation);
    }
}