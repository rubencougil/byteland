<?php

namespace Byteland\Presentation\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class TransformerProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['transformer.restaurant'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Transformer\Restaurant();
        });

        $app['transformer.client'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Transformer\Client();
        });

        $app['transformer.reservation'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Transformer\Reservation();
        });
    }

    public function boot(Application $app)
    {
    }
}