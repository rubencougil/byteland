<?php

namespace Byteland\Presentation\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class UseCaseProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['usecase.getrestaurant'] = $app->share(function ($name) use ($app) {
            return new \Byteland\Domain\Usecase\GetRestaurant(
                $app['repo.restaurant']
            );
        });

        $app['usecase.addrestaurant'] = $app->share(function ($name) use ($app) {
            return new \Byteland\Domain\Usecase\AddRestaurant(
                $app['repo.restaurant']
            );
        });

        $app['usecase.listrestaurant'] = $app->share(function ($name) use ($app) {
            return new \Byteland\Domain\Usecase\ListRestaurant(
                $app['repo.restaurant']
            );
        });

        $app['usecase.removerestaurant'] = $app->share(function ($name) use ($app) {
            return new \Byteland\Domain\Usecase\RemoveRestaurant(
                $app['repo.restaurant']
            );
        });
    }

    public function boot(Application $app)
    {
    }
}