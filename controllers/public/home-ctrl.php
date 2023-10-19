<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/constants.php';
require_once __DIR__ . '/../../models/Vehicle.php';

try {
    $title = 'RENT MY RIDE - Homepage';
    $style = 'style';
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
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/pages/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/pages/home.php';
include __DIR__ . '/../../views/templates/footer.php';
