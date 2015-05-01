<?php

namespace Byteland\Presentation\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class RepositoryProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['repo.restaurant'] = $app->share(function() use ($app) {
            return new \Byteland\Infrastructure\Repository\Json\Restaurant(
                __DIR__ . "/../../DataSource/restaurants.json"
            );
        });
    }

    public function boot(Application $app)
    {
    }
}