<?php

namespace Byteland\Domain\Usecase\Reservation;

use Byteland\Domain\Repository\Reservation as ReservationRepo;

class RemoveReservation
{
    private $reservationRepo;

    public function __construct(ReservationRepo $reservationRepo)
    {
        $this->reservationRepo = $reservationRepo;
    }

    public function handle($id)
    {
        return $this->reservationRepo->delete($id);
    }
}