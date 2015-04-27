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
    }

    public function boot(Application $app)
    {
    }
}