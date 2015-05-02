<?php

namespace Byteland\Domain\Entity;

use Byteland\Domain\ValueObject\Date;

class Reservation
{
    private $id;
    private $restaurant;
    private $client;
    private $date;

    public function __construct(Restaurant $restaurant, Client $client, Date $date)
    {
        $this->restaurant = $restaurant;
        $this->client = $client;
        $this->date = $date;
        $this->id = uniqid();
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