<?php

$restaurant = $app['controllers_factory'];
$restaurant->get('/', 'controller.listrestaurant:execute');
$restaurant->get('/{name}', 'controller.getrestaurant:execute');
$restaurant->post('/', 'controller.addrestaurant:execute');
$restaurant->delete('/{name}', 'controller.removerestaurant:execute');

return $restaurant;