<?php

namespace Byteland\Presentation\Controller;

use Byteland\Domain\Usecase\GetRestaurant as GetRestaurantUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Byteland\Presentation\Transformer\Restaurant as RestaurantTransformer;

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
        $name = $request->get('name');
        $restaurant = $this->getRestaurantUseCase->handle($name);
        $restaurantView = $this->restaurantTransformer->transform($restaurant);
        return JsonResponse::create($restaurantView);
    }

    public function jsonSerialize()
    {
        return [
            'name' => $this->restaurant->name()
        ];
    }
}