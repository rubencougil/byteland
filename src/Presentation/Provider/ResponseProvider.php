<?php

namespace Byteland\Presentation\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class ResponseProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['response.json'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Response\Json();
        });

        $app['response.error'] = $app->share(function() use ($app) {
            return new \Byteland\Presentation\Response\Error();
        });
    }

    public function boot(Application $app)
    {
    }
}