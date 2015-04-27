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
    }

    public function boot(Application $app)
    {
    }
}