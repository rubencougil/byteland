<?php

namespace Byteland\Domain\Repository;

use \Byteland\Domain\Entity\Reservation as ReservationEntity;

interface Reservation
{
    public function get($id);

    public function add(ReservationEntity $reservation);

    public function all();

    public function delete($id);
}