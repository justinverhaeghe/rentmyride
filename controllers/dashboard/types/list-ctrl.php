<?php

require_once __DIR__ . '/../../../models/Type.php';
require_once __DIR__ . '/../../../config/constants.php';
require_once __DIR__ . '/../../../config/database.php';

try {
    $errors = [];

    $title = 'RENT MY RIDE - Liste des catégories';
    $style = 'dashboard';
    $page = 'Ajouter une catégorie';
} catch (\Throwable $th) {
    //throw $th;
}



include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/templates/navbar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/types/list.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
