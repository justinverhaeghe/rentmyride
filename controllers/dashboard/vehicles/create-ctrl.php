<?php


require_once __DIR__ . '/../../../models/Vehicle.php';
require_once __DIR__ . '/../../../config/constants.php';
require_once __DIR__ . '/../../../config/database.php';


try {
    $errors = [];
    $title = 'RENT MY RIDE - Ajouter un Véhicule';
    $style = 'dashboard';
    $page = 'Ajouter un véhicule';
    $brandConfig = __DIR__ . '/../../../config/brands.json';
    $data = file_get_contents($brandConfig);
    $brandDatas = json_decode($data);
    $brandDatas = array_column($brandDatas, 'name');

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Validation du select BRANDS
        $brand = filter_input(INPUT_POST, 'brand');
        if (empty($brand)) {
            $errors['brand'] = 'Veuillez obligatoirement sélectionner un modèle';
        } else {
            if (!in_array($brand, $brandDatas)) {
                $errors['brand'] = 'Veuillez sélectionner un modèle';
            }
        }

        // Validation du modèle
        $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($model)) {
            $errors['model'] = 'Veuillez obligatoirement entrer un nom de catégorie';
        } else {
            if (!preg_match(REGEX_MODEL, $model)) {
                $errors['model'] = 'Veuillez entrer un nom de catégorie valide';
            }
            // if (Vehicle::exists($model)) {
            //     $errors['model'] =  'Le model existe déjà dans la base de données.';
            // }
        }
        if (empty($errors)) {
            $typeObj = new Type();
            $typeObj->set_type($type);
            $isSaved = $typeObj->insert();
        }
    };
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
include __DIR__ . '/../../../views/dashboard/vehicles/create.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
