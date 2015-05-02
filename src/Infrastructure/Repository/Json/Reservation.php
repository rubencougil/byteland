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
        if (array_key_exists($id, $this->reservations))
        {
            return new ReservationEntity(
                new Restaurant($this->reservations[$id]['restaurant']),
                new Client($this->reservations[$id]['client']),
                new Date($this->reservations[$id]['date']),
                $id
            );
        }
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
        $reservations = [];

        foreach ($this->reservations as $id => $details)
        {
            $reservations[] = new ReservationEntity(
                new Restaurant($details['restaurant']),
                new Client($details['client']),
                new Date($details['date']),
                $id
            );
        }


        return $reservations;
    }

    public function delete($id)
    {
        unset($this->reservations[$id]);
        $this->persist();
        return $this->all();
    }

    public function find(ReservationEntity $reservation)
    {
        foreach ($this->reservations as $key => $value)
        {
            if($value['restaurant'] === $reservation->restaurant()->name()
                && $value['client'] === $reservation->client()->name()
                && $value['date'] === $reservation->date()->date())
            {
                return $this->get($key);
            }
        }
    }

    public function persist()
    {
        file_put_contents($this->path, json_encode($this->reservations));
    }
}