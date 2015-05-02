<?php

namespace Byteland\Domain\Entity;

use Byteland\Domain\ValueObject\Date;

class Reservation
{
    private $id;
    private $restaurant;
    private $client;
    private $date;

    public function __construct(Restaurant $restaurant, Client $client, Date $date, $id = null)
    {
        $this->id = $id ? $id : uniqid();
        $this->restaurant = $restaurant;
        $this->client = $client;
        $this->date = $date;
    }

    public function id()
    {
        return $this->id;
    }

    public function restaurant()
    {
        return $this->restaurant;
    }

    public function client()
    {
        return $this->client;
    }

    public function date()
    {
        return $this->date;
    }
}