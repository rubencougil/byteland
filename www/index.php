<?php

require_once __DIR__.'/../vendor/autoload.php';

use Silex\Provider;

$app = new Silex\Application();
\Symfony\Component\Debug\Debug::enable();
$app['debug'] = true;

$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new Byteland\Presentation\Provider\TransformerProvider());
$app->register(new Byteland\Presentation\Provider\RepositoryProvider());
$app->register(new Byteland\Presentation\Provider\ControllerProvider());
$app->register(new Byteland\Presentation\Provider\UseCaseProvider());

$app->register(new Provider\ServiceControllerServiceProvider());
$app->register(new Provider\TwigServiceProvider());
$app->register(new Provider\UrlGeneratorServiceProvider());

$app->register(new Provider\WebProfilerServiceProvider(), array(
    'profiler.cache_dir' => '/tmp/cache/profiler',
    'profiler.mount_prefix' => '/_profiler'
));

$app->get('/restaurant/{name}', 'controller.getrestaurant:execute');

$app->run(); 