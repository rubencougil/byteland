<?php

namespace Byteland\Presentation\Transformer;

use Byteland\Domain\Entity\Reservation as ReservationEntity;
use Byteland\Presentation\View\Reservation as ReservationView;;

class Reservation
{
    public function transform(ReservationEntity $reservation)
    {
        return new ReservationView($reservation);
    }

    public function transformList(array $reservationList)
    {
        return array_map(function($reservation){
            return self::transform($reservation);
        }, $reservationList);
    }
}