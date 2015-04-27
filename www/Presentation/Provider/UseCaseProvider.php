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
    }

    public function boot(Application $app)
    {
    }
}