<?php

namespace Byteland\Presentation\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class RepositoryProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['repo.restaurant'] = $app->share(function() use ($app) {
            return new \Byteland\Infrastructure\Repository\Fake\Restaurant;
        });
    }

    public function boot(Application $app)
    {
    }
}