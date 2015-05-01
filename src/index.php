<?php

require_once __DIR__.'/../vendor/autoload.php';

use Silex\Provider;

$app = new Silex\Application();
\Symfony\Component\Debug\Debug::enable();
$app['debug'] = true;

$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new Byteland\Presentation\Provider\ResponseProvider());
$app->register(new Byteland\Presentation\Provider\TransformerProvider());
$app->register(new Byteland\Presentation\Provider\RepositoryProvider());
$app->register(new Byteland\Presentation\Provider\ControllerProvider());
$app->register(new Byteland\Presentation\Provider\UseCaseProvider());


// Routing
$app->mount('/restaurant', include __DIR__.'/Presentation/Routes/Restaurant.php');
$app->after('response.json:execute');

$app->run(); 