<?php

namespace Byteland\Domain\Usecase\Reservation;

use Byteland\Domain\Repository\Reservation as ReservationRepo;

class GetReservation
{
    private $reservationRepo;

    public function __construct(ReservationRepo $reservationRepo)
    {
        $this->reservationRepo = $reservationRepo;
    }

    public function handle($id)
    {
        return $this->reservationRepo->get($id);
    }
}