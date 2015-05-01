<?php

namespace Byteland\Presentation\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Byteland\Domain\Usecase\ListRestaurant as ListRestaurantUseCase;
use Byteland\Presentation\Transformer\Restaurant as RestaurantTransformer;

class ListRestaurant
{
    private $listRestaurantUseCase;

    public function __construct(
        ListRestaurantUseCase $listRestaurantUseCase,
        RestaurantTransformer $restaurantTransformer
    )
    {
        $this->listRestaurantUseCase = $listRestaurantUseCase;
        $this->restaurantTransformer = $restaurantTransformer;
    }

    public function execute()
    {
        $restaurantList = $this->listRestaurantUseCase->handle();

        return JsonResponse::create(
            $this->restaurantTransformer->transformList($restaurantList)
        );
    }
}