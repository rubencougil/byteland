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

        $app['usecase.getreservation'] = $app->share(function() use ($app) {
            return new \Byteland\Domain\Usecase\Reservation\GetReservation(
                $app['repo.reservation']
            );
        });

        $app['usecase.addreservation'] = $app->share(function() use ($app) {
            return new \Byteland\Domain\Usecase\Reservation\AddReservation(
                $app['repo.reservation']
            );
        });

        $app['usecase.removereservation'] = $app->share(function() use ($app) {
            return new \Byteland\Domain\Usecase\Reservation\RemoveReservation(
                $app['repo.reservation']
            );
        });

        $app['usecase.listreservation'] = $app->share(function() use ($app) {
            return new \Byteland\Domain\Usecase\Reservation\ListReservation(
                $app['repo.reservation']
            );
        });
    }

    public function boot(Application $app)
    {
    }
}