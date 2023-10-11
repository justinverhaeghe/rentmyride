<?php

require_once __DIR__ . '/../../../config/constants.php';
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/Type.php';

try {
    $errors = [];
    $title = 'RENT MY RIDE - Liste des catégories';
    $style = 'dashboard';
    $page = 'Liste des catégories de véhicules';
    $types = Type::get_all();
    $delete = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
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
include __DIR__ . '/../../../views/dashboard/types/list.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
