<?php

namespace Byteland\Presentation\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class UseCaseProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['usecase.getrestaurant'] = $app->share(function() use ($app) {
            return new \Byteland\Domain\Usecase\Restaurant\GetRestaurant(
                $app['repo.restaurant']
            );
        });

        $app['usecase.addrestaurant'] = $app->share(function() use ($app) {
            return new \Byteland\Domain\Usecase\Restaurant\AddRestaurant(
                $app['repo.restaurant']
            );
        });

        $app['usecase.listrestaurant'] = $app->share(function() use ($app) {
            return new \Byteland\Domain\Usecase\Restaurant\ListRestaurant(
                $app['repo.restaurant']
            );
        });

        $app['usecase.removerestaurant'] = $app->share(function() use ($app) {
            return new \Byteland\Domain\Usecase\Restaurant\RemoveRestaurant(
                $app['repo.restaurant']
            );
        });

        $app['usecase.getclient'] = $app->share(function() use ($app) {
            return new \Byteland\Domain\Usecase\Client\GetClient(
                $app['repo.client']
            );
        });

        $app['usecase.addclient'] = $app->share(function() use ($app) {
            return new \Byteland\Domain\Usecase\Client\AddClient(
                $app['repo.client']
            );
        });

        $app['usecase.removeclient'] = $app->share(function() use ($app) {
            return new \Byteland\Domain\Usecase\Client\RemoveClient(
                $app['repo.client']
            );
        });

        $app['usecase.listclient'] = $app->share(function() use ($app) {
            return new \Byteland\Domain\Usecase\Client\ListClient(
                $app['repo.client']
            );
        });
    }

    public function boot(Application $app)
    {
    }
}