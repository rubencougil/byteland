<?php

namespace Byteland\Presentation\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class ControllerProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['controller.getrestaurant'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Controller\GetRestaurant(
                $app['usecase.getrestaurant'],
                $app['transformer.restaurant']
            );
        });

        $app['controller.addrestaurant'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Controller\AddRestaurant(
                $app['usecase.addrestaurant'],
                $app['transformer.restaurant']
            );
        });

        $app['controller.listrestaurant'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Controller\ListRestaurant(
                $app['usecase.listrestaurant'],
                $app['transformer.restaurant']
            );
        });

        $app['controller.removerestaurant'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Controller\RemoveRestaurant(
                $app['usecase.removerestaurant'],
                $app['transformer.restaurant']
            );
        });
    }

    public function boot(Application $app)
    {
    }
}