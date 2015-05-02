<?php

namespace Byteland\Infrastructure\Repository\Json;

use Byteland\Domain\Entity\Client;
use Byteland\Domain\Entity\Reservation as ReservationEntity;
use Byteland\Domain\Entity\Restaurant;
use Byteland\Domain\Repository\Reservation as ReservationRepository;
use Byteland\Domain\ValueObject\Date;

class Reservation implements ReservationRepository
{
    private $reservations;
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
        $this->reservations = json_decode(file_get_contents($path), true);
    }

    public function get($id)
    {
        return new ReservationEntity(
            new Restaurant($this->reservations[$id]['restaurant']),
            new Client($this->reservations[$id]['client']),
            new Date($this->reservations[$id]['date'])
        );
    }

    public function add(ReservationEntity $reservation)
    {
        $this->reservations[$reservation->id()] = [
            'restaurant' => $reservation->restaurant()->name(),
            'client' => $reservation->client()->name(),
            'date' => $reservation->date()->date()
        ];

        $this->persist();

        return $this->get($reservation->id());
    }

    public function all()
    {
        return array_map(function($reservation){
            return new ReservationEntity(
                new Restaurant($reservation['restaurant']),
                new Client($reservation['client']),
                new Date($reservation['date'])
                );
        }, $this->reservations);
    }

    public function delete($id)
    {
        unset($this->reservations[$id]);
        $this->persist();
        return $this->all();
    }

    public function persist()
    {
        file_put_contents($this->path, json_encode($this->reservations));
    }
}