<?php

namespace spec\Byteland\Domain\Usecase\Reservation;

use Byteland\Domain\Entity\Reservation;
use Byteland\Domain\Entity\Restaurant;
use Byteland\Domain\Entity\Client;
use Byteland\Domain\Repository\Reservation as ReservationRepo;
use Byteland\Domain\Repository\Restaurant as RestaurantRepo;
use Byteland\Domain\Repository\Client as ClientRepo;
use Byteland\Domain\ValueObject\Date;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddReservationSpec extends ObjectBehavior
{
    function let(
        ReservationRepo $reservationRepo,
        RestaurantRepo $restaurantRepo,
        ClientRepo $clientRepo
    )
    {
        $reservationRepo->beADoubleOf('Byteland\Domain\Repository\Reservation');
        $restaurantRepo->beADoubleOf('Byteland\Domain\Repository\Restaurant');
        $clientRepo->beADoubleOf('Byteland\Domain\Repository\Client');
        $this->beConstructedWith($reservationRepo, $restaurantRepo, $clientRepo);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Byteland\Domain\Usecase\Reservation\AddReservation');
    }

    function it_restaurant_exist_throw_exception($reservationRepo, $restaurantRepo, $clientRepo)
    {
        $restaurant = new Restaurant('test_restaurant');
        $client  = new Client('test_client');
        $date = new Date('01/01/2015');

        $restaurantRepo->get($restaurant->name())->willReturn($restaurant);
        $reservation = new Reservation($restaurant, $client, $date);
        $this->shouldThrow('Byteland\Domain\Exception\ReservationException')->during('handle', [$reservation]);
    }

    function it_client_exist_throw_exception($reservationRepo, $restaurantRepo, $clientRepo)
    {
        $restaurant = new Restaurant('test_restaurant');
        $client = new Client('test_client');
        $date = new Date('01/01/2015');

        $clientRepo->get($client->name())->willReturn($client);
        $reservation = new Reservation($restaurant, $client, $date);
        $this->shouldThrow('Byteland\Domain\Exception\ReservationException')->during('handle', [$reservation]);
    }


    function it_reservation_exist_throw_exception($reservationRepo, $restaurantRepo, $clientRepo)
    {
        $restaurant = new Restaurant('test_restaurant');
        $client  = new Client('test_client');
        $date = new Date('01/01/2015');
        $reservation = new Reservation($restaurant, $client, $date);

        $clientRepo->get($client->name())->willReturn(null);
        $restaurantRepo->get($restaurant->name())->willReturn(null);
        $reservationRepo->find($reservation)->willReturn($reservation);

        $this->shouldThrow('Byteland\Domain\Exception\ReservationException')->during('handle', [$reservation]);
    }
}
