<?php

namespace Byteland\Presentation\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class ControllerProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['controller.getrestaurant'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Controller\Restaurant\GetRestaurant(
                $app['usecase.getrestaurant'],
                $app['transformer.restaurant']
            );
        });

        $app['controller.addrestaurant'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Controller\Restaurant\AddRestaurant(
                $app['usecase.addrestaurant'],
                $app['transformer.restaurant']
            );
        });

        $app['controller.listrestaurant'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Controller\Restaurant\ListRestaurant(
                $app['usecase.listrestaurant'],
                $app['transformer.restaurant']
            );
        });

        $app['controller.removerestaurant'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Controller\Restaurant\RemoveRestaurant(
                $app['usecase.removerestaurant'],
                $app['transformer.restaurant']
            );
        });

        $app['controller.getclient'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Controller\Client\GetClient(
                $app['usecase.getclient'],
                $app['transformer.client']
            );
        });

        $app['controller.addclient'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Controller\Client\AddClient(
                $app['usecase.addclient'],
                $app['transformer.client']
            );
        });

        $app['controller.listclient'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Controller\Client\ListClient(
                $app['usecase.listclient'],
                $app['transformer.client']
            );
        });

        $app['controller.removeclient'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Controller\Client\RemoveClient(
                $app['usecase.removeclient'],
                $app['transformer.client']
            );
        });

        $app['controller.getreservation'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Controller\Reservation\GetReservation(
                $app['usecase.getreservation'],
                $app['transformer.reservation']
            );
        });

        $app['controller.removereservation'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Controller\Reservation\RemoveReservation(
                $app['usecase.removereservation'],
                $app['transformer.reservation']
            );
        });

        $app['controller.addreservation'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Controller\Reservation\AddReservation(
                $app['usecase.addreservation'],
                $app['transformer.reservation']
            );
        });

        $app['controller.listreservation'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Controller\Reservation\ListReservation(
                $app['usecase.listreservation'],
                $app['transformer.reservation']
            );
        });
    }

    public function boot(Application $app)
    {
    }
}