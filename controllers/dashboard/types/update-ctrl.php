<?php

require_once __DIR__ . '/../../../config/constants.php';
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/Type.php';

try {
    $errors = [];
    $title = 'RENT MY RIDE - Mise à jour de la catégorie';
    $style = 'dashboard';
    $page = 'Mise à jour de la catégorie';
    $id_types = intval(filter_input(INPUT_GET, 'id_types', FILTER_SANITIZE_NUMBER_INT));
    $stdType = Type::get($id_types);

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
            $typeObj->set_id_types($id_types);
            $isSaved = $typeObj->update();
            if ($isSaved) {
                header('location: /controllers/dashboard/types/list-ctrl.php');
                die;
            } else {
                $error =  '<p class="pt-3">Erreur lors de l\'enregistrement</p>';
            }
        }
    };
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
include __DIR__ . '/../../../views/dashboard/types/update.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
