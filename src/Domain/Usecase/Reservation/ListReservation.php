<?php

namespace Byteland\Domain\Usecase\Reservation;

use Byteland\Domain\Repository\Reservation as ReservationRepo;

class ListReservation
{
    private $reservationRepo;

    public function __construct(ReservationRepo $reservationRepo)
    {
        $this->reservationRepo = $reservationRepo;
    }

    public function handle()
    {
        return $this->reservationRepo->all();
    }
}