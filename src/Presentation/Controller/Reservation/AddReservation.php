<?php

namespace Byteland\Presentation\Controller\Reservation;

use Byteland\Domain\Entity\Client;
use Byteland\Domain\Entity\Reservation;
use Byteland\Domain\Entity\Restaurant;
use Byteland\Domain\ValueObject\Date;
use Symfony\Component\HttpFoundation\Request;
use Byteland\Domain\Usecase\Reservation\AddReservation as AddReservationUseCase;
use Byteland\Presentation\Transformer\Reservation as ReservationTransformer;
use Symfony\Component\HttpFoundation\Response;

class AddReservation
{
    private $addReservationUseCase;
    private $reservationTransformer;

    public function __construct(
        AddReservationUseCase $addReservationUseCase,
        ReservationTransformer $reservationTransformer
    )
    {
        $this->addReservationUseCase = $addReservationUseCase;
        $this->reservationTransformer = $reservationTransformer;
    }

    /**
     * @throws \Byteland\Domain\Exception\ReservationException When reservation cannot be added;
     */
    public function execute(Request $request)
    {
        $reservation = $this->addReservationUseCase->handle(
            new Reservation(
                new Restaurant($request->get('restaurant'), null),
                new Client($request->get('client')),
                new Date($request->get('date'))
            )
        );

        return Response::create(
            serialize($this->reservationTransformer->transform($reservation))
        );
    }
}