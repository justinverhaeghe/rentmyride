<?php

require_once __DIR__ . '/../../../config/constants.php';
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/vehicle.php';

try {
    $errors = [];
    $title = 'RENT MY RIDE - Suppression du véhicule';
    $style = 'dashboard';
    $page = 'Suppresion du véhicule';
    $id_vehicles = intval(filter_input(INPUT_GET, 'id_vehicles', FILTER_SANITIZE_NUMBER_INT));
    $thisVehicle = Vehicle::get($id_vehicles);
    $archiveObj = (int) Vehicle::delete($id_vehicles);
    if ($archiveObj) {
        @unlink(__DIR__ . '/../public/uploads/vehicles/' . $thisVehicle->picture);
    }
    header('location: /controllers/dashboard/vehicles/list-ctrl.php?delete=' . $archiveObj);
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/navbar-dashboard.php';
    include __DIR__ . '/../../../views/pages/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}
