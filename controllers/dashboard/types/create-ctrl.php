<?php

require_once __DIR__ . '/../../../models/Type.php';
require_once __DIR__ . '/../../../config/constants.php';
require_once __DIR__ . '/../../../config/database.php';

try {
    $errors = [];

    $title = 'RENT MY RIDE - Ajouter une catégorie';
    $style = 'dashboard';
    $page = 'Ajouter une catégorie';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Validation de la catégorie
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($type)) {
            $errors['type'] = 'Veuillez obligatoirement entrer un nom de catégorie';
        } else {
            if (preg_match(REGEX_TYPE, $type) == false) {
                $errors['type'] = 'Veuillez entrer un nom de catégorie valide';
            }
        }
        if (empty($errors)) {
            $typeObj = new Type();
            $typeObj->set_type($type);
            $isSaved = $typeObj->insert();
        }
    };
} catch (\Throwable $th) {
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/navbar-dashboard.php';
    include __DIR__ . '/../../../views/pages/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}



include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/templates/navbar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/types/create.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
