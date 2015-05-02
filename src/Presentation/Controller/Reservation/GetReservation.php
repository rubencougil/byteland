<?php

namespace Byteland\Presentation\Controller\Reservation;

use Symfony\Component\HttpFoundation\Request;
use Byteland\Domain\Usecase\Reservation\GetReservation as GetReservationUseCase;
use Byteland\Presentation\Transformer\Reservation as ReservationTransformer;
use Symfony\Component\HttpFoundation\Response;

class GetReservation
{
    private $getReservationUseCase;
    private $reservationTransformer;

    public function __construct(
        GetReservationUseCase $getReservationUseCase,
        ReservationTransformer $reservationTransformer
    )
    {
        $this->getReservationUseCase = $getReservationUseCase;
        $this->reservationTransformer = $reservationTransformer;
    }

    public function execute(Request $request)
    {
        $reservation = $this->getReservationUseCase->handle(
            $request->get('id')
        );

        return Response::create(
            serialize($this->reservationTransformer->transform($reservation))
        );
    }
}