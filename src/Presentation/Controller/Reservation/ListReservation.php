<?php

namespace Byteland\Presentation\Controller\Reservation;

use Byteland\Domain\Usecase\Reservation\ListReservation as ListReservationUseCase;
use Byteland\Presentation\Transformer\Reservation as ReservationTransformer;
use Symfony\Component\HttpFoundation\Response;

class ListReservation
{
    private $listReservationUseCase;
    private $reservationTransformer;

    public function __construct(
        ListReservationUseCase $listReservationUseCase,
        ReservationTransformer $reservationTransformer
    )
    {
        $this->listReservationUseCase = $listReservationUseCase;
        $this->reservationTransformer = $reservationTransformer;
    }

    public function execute()
    {
        $reservation = $this->listReservationUseCase->handle();

        return Response::create(
            serialize($this->reservationTransformer->transformList($reservation))
        );
    }
}