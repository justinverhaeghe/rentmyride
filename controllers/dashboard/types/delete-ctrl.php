<?php

require_once __DIR__ . '/../../../config/constants.php';
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/Type.php';

try {
    $errors = [];
    $title = 'RENT MY RIDE - Suppression de la catégorie';
    $style = 'dashboard';
    $page = 'Suppresion de la catégorie';
    $id_types = intval(filter_input(INPUT_GET, 'id_types', FILTER_SANITIZE_NUMBER_INT));
    $deleteObj = (int) Type::delete($id_types);
    header('location: /controllers/dashboard/types/list-ctrl.php?delete=' . $deleteObj);
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/navbar-dashboard.php';
    include __DIR__ . '/../../../views/pages/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}
