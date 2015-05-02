<?php

namespace Byteland\Presentation\View;

use Byteland\Domain\Entity\Reservation as ReservationEntity;

class Reservation implements \JsonSerializable
{
    private $reservation;

    public function __construct(ReservationEntity $reservation)
    {
        $this->reservation = $reservation;
        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'restaurant' => $this->reservation->restaurant()->name(),
            'client' => $this->reservation->client()->name(),
            'date' => $this->reservation->date()->date()
        ];
    }
}