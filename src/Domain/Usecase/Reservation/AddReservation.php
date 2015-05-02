<?php

namespace Byteland\Domain\Usecase\Reservation;

use Byteland\Domain\Entity\Reservation;
use Byteland\Domain\Exception\ReservationException;
use Byteland\Domain\Repository\Reservation as ReservationRepo;
use Byteland\Domain\Repository\Restaurant as RestaurantRepo;
use Byteland\Domain\Repository\Client as ClientRepo;

class AddReservation
{
    private $reservationRepo;
    private $restaurantRepo;
    private $clientRepo;

    public function __construct(
        ReservationRepo $reservationRepo,
        RestaurantRepo  $restaurantRepo,
        ClientRepo $clientRepo
    )
    {
        $this->reservationRepo = $reservationRepo;
        $this->restaurantRepo = $restaurantRepo;
        $this->clientRepo = $clientRepo;
    }

    public function handle(Reservation $reservation)
    {
        $this->checkReservationExists($reservation);
        $this->checkRestaurantExists($reservation);
        $this->checkClientExists($reservation);

        return $this->reservationRepo->add($reservation);
    }

    public function clientExists($reservation)
    {
        return (bool)$this->clientRepo->get($reservation->client()->name());
    }

    public function restaurantExists($reservation)
    {
        return (bool)$this->restaurantRepo->get($reservation->restaurant()->name());
    }

    public function checkReservationExists(Reservation $reservation)
    {
        if ($this->reservationRepo->find($reservation)
        ) {
            throw new ReservationException("Reservation with: Restaurant: {$reservation->restaurant()->name()},
                Client: {$reservation->client()->name()}, Date: {$reservation->date()->date()} already exists");
        }
    }

    public function checkRestaurantExists(Reservation $reservation)
    {
        if (!$this->restaurantExists($reservation)) {
            throw new ReservationException("Restaurant {$reservation->restaurant()->name()} does not exist");
        }
    }

    public function checkClientExists(Reservation $reservation)
    {
        if (!$this->clientExists($reservation)) {
            throw new ReservationException("Client {$reservation->client()->name()} does not exist");
        }
    }
}