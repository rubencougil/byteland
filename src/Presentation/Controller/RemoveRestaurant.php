<?php

namespace Byteland\Presentation\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Byteland\Domain\Usecase\RemoveRestaurant as RemoveRestaurantUseCase;
use Byteland\Presentation\Transformer\Restaurant as RestaurantTransformer;

class RemoveRestaurant
{
    private $removeRestaurantUseCase;

    public function __construct(
        RemoveRestaurantUseCase $removeRestaurantUseCase,
        RestaurantTransformer $restaurantTransformer
    )
    {
        $this->removeRestaurantUseCase = $removeRestaurantUseCase;
        $this->restaurantTransformer = $restaurantTransformer;
    }

    public function execute(Request $request)
    {
        $restaurantList = $this->removeRestaurantUseCase->handle(
            $request->get('name')
        );

        return JsonResponse::create(
            $this->restaurantTransformer->transformList($restaurantList)
        );
    }
}