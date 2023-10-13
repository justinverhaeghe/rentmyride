<?php

require_once __DIR__ . '/../../../config/constants.php';
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/Vehicle.php';

try {
    $errors = [];
    $title = 'RENT MY RIDE - Liste des véhicules';
    $style = 'dashboard';
    $page = 'Liste des véhicules';
    $columns = ['type', 'brand', 'model', 'registration', 'mileage'];
    $column = filter_input(INPUT_GET, 'column');
    if (!in_array($column, $columns)) {
        $column = 'type';
    }
    $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_SPECIAL_CHARS);
    if ((empty($order) || $order != 'ASC') && $order != 'DESC') {
        $order = 'ASC';
    }
    $vehicles = Vehicle::get_all($column, $order);

    $delete = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
} catch (\Throwable $th) {
    $errors = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/navbar-dashboard.php';
    include __DIR__ . '/../../../views/pages/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}



include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/templates/navbar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/vehicles/list.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
