<?php

namespace Byteland\Presentation\Controller;

use Byteland\Domain\Entity\Restaurant;
use Symfony\Component\HttpFoundation\Request;
use Byteland\Domain\Usecase\AddRestaurant as AddRestaurantUseCase;
use Byteland\Presentation\Transformer\Restaurant as RestaurantTransformer;
use Symfony\Component\HttpFoundation\Response;

class AddRestaurant
{
    private $addRestaurantUseCase;

    public function __construct(
        AddRestaurantUseCase $addRestaurantUseCase,
        RestaurantTransformer $restaurantTransformer
    )
    {
        $this->addRestaurantUseCase = $addRestaurantUseCase;
        $this->restaurantTransformer = $restaurantTransformer;
    }

    public function execute(Request $request)
    {
        $restaurant = $this->addRestaurantUseCase->handle(
            new Restaurant($request->get('name'), $request->get('max'))
        );

        return Response::create(
            serialize($this->restaurantTransformer->transform($restaurant))
        );
    }
}