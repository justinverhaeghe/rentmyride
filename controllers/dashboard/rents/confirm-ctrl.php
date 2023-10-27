<?php

require_once __DIR__ . '/../../../config/constants.php';
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/Rent.php';

try {
    $errors = [];
    $title = 'RENT MY RIDE - Suppression du véhicule';
    $style = 'dashboard';
    $page = 'Confirmation de la réservation';
    $id_rents = filter_input(INPUT_GET, 'id_rents', FILTER_SANITIZE_NUMBER_INT);
    $confirm = Rent::confirm($id_rents);

    header('location: /controllers/dashboard/rents/list-ctrl.php?confirm=' . $confirm);
    die;
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/navbar-dashboard.php';
    include __DIR__ . '/../../../views/pages/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}
