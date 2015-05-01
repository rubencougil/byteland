<?php

$client = $app['controllers_factory'];
$client->get('/', 'controller.listclient:execute');
$client->get('/{name}', 'controller.getclient:execute');
$client->post('/', 'controller.addclient:execute');
$client->delete('/{name}', 'controller.removeclient:execute');

return $client;