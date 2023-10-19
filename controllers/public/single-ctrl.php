<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/constants.php';
require_once __DIR__ . '/../../models/Vehicle.php';

try {
    $title = 'RENT MY RIDE - Détails des véhicules';
    $style = 'single';
    $id_vehicles = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $vehicle = Vehicle::get($id_vehicles);
    $dateCreated = $vehicle->created_at;
    $date = new DateTime($dateCreated);
    $dateFormated = $date->format('d-m-Y');
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/pages/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/pages/single.php';
include __DIR__ . '/../../views/templates/footer.php';
