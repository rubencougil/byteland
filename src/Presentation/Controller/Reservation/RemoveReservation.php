<?php

namespace Byteland\Presentation\Controller\Reservation;

use Symfony\Component\HttpFoundation\Request;
use Byteland\Domain\Usecase\Reservation\RemoveReservation as RemoveReservationUseCase;
use Byteland\Presentation\Transformer\Reservation as ReservationTransformer;
use Symfony\Component\HttpFoundation\Response;

class RemoveReservation
{
    private $removeReservationUseCase;
    private $reservationTransformer;

    public function __construct(
        RemoveReservationUseCase $removeReservationUseCase,
        ReservationTransformer $reservationTransformer
    )
    {
        $this->removeReservationUseCase = $removeReservationUseCase;
        $this->reservationTransformer = $reservationTransformer;
    }

    public function execute(Request $request)
    {
        $reservation = $this->removeReservationUseCase->handle(
            $request->get('id')
        );

        return Response::create(
            serialize($this->reservationTransformer->transformList($reservation))
        );
    }
}