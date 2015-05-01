<?php

namespace Byteland\Presentation\Controller;

use Symfony\Component\HttpFoundation\Request;
use Byteland\Domain\Usecase\GetRestaurant as GetRestaurantUseCase;
use Byteland\Presentation\Transformer\Restaurant as RestaurantTransformer;
use Symfony\Component\HttpFoundation\Response;

class GetRestaurant
{
    private $getRestaurantUseCase;

    public function __construct(
        GetRestaurantUseCase $getRestaurantUseCase,
        RestaurantTransformer $restaurantTransformer
    )
    {
        $this->getRestaurantUseCase = $getRestaurantUseCase;
        $this->restaurantTransformer = $restaurantTransformer;
    }

    public function execute(Request $request)
    {
        $restaurant = $this->getRestaurantUseCase->handle(
            $request->get('name')
        );

        return Response::create(
            serialize($this->restaurantTransformer->transform($restaurant))
        );
    }
}