<?php

require_once __DIR__ . '/../../../config/constants.php';
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/Type.php';
require_once __DIR__ . '/../../../models/Vehicle.php';
require_once __DIR__ . '/../../../models/Rent.php';

try {
    $errors = [];
    $title = 'RENT MY RIDE - DASHBOARD';
    $style = 'dashboard';
    $page = 'Liste des réservations';
    $rents = Rent::getAll();
    $confirm = filter_input(INPUT_GET, 'confirm', FILTER_SANITIZE_NUMBER_INT);
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/navbar-dashboard.php';
    include __DIR__ . '/../../../views/pages/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}




include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/templates/navbar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/rents/list.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
