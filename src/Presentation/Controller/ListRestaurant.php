<?php

namespace Byteland\Presentation\Controller;

use Byteland\Domain\Usecase\ListRestaurant as ListRestaurantUseCase;
use Byteland\Presentation\Transformer\Restaurant as RestaurantTransformer;
use Symfony\Component\HttpFoundation\Response;

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

        return Response::create(
            serialize($this->restaurantTransformer->transformList($restaurantList))
        );
    }
}