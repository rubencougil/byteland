<?php

$reservation = $app['controllers_factory'];
$reservation->get('/', 'controller.listreservation:execute');
$reservation->get('/{id}', 'controller.getreservation:execute');
$reservation->post('/', 'controller.addreservation:execute');
$reservation->delete('/{id}', 'controller.removereservation:execute');

return $reservation;