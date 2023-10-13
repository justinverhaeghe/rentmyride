<?php


require_once __DIR__ . '/../../../models/Type.php';
require_once __DIR__ . '/../../../models/Vehicle.php';
require_once __DIR__ . '/../../../config/constants.php';
require_once __DIR__ . '/../../../config/database.php';



try {
    $errors = [];
    $title = 'RENT MY RIDE - Ajouter un Véhicule';
    $style = 'dashboard';
    $page = 'Formulaire d\'ajout d\'un véhicule';
    $brandConfig = __DIR__ . '/../../../config/brands.json';
    $data = file_get_contents($brandConfig);
    $brandDatas = json_decode($data);
    $brandDatas = array_column($brandDatas, 'name');
    $types =  Type::get_all();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Validation de l'id du type
        $id_types = intval(filter_input(INPUT_POST, 'id_types', FILTER_SANITIZE_NUMBER_INT));
        Type::get($id_types);
        if (!$id_types) {
            $errors['id_types'] = 'Veuillez sélectionner une catégorie valide';
        }

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
        }

        // Validation du modèle
        $registration = filter_input(INPUT_POST, 'registration', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($registration)) {
            $errors['registration'] = 'Veuillez obligatoirement entrer une immatriculation';
        } else {
            if (!preg_match(REGEX_REGISTRATION, $registration)) {
                $errors['registration'] = 'Veuillez entrer une immatriculation au format XX-XXX-XX';
            }
        }

        // Validation du kilométrage du véhicule.
        $mileage = intval(filter_input(INPUT_POST, 'mileage', FILTER_SANITIZE_NUMBER_INT));
        if (empty($mileage)) {
            $errors['mileage'] = 'Veuillez obligatoirement entrer un kilométrage';
        } else {
            if (!preg_match(REGEX_MILEAGE, $mileage)) {
                $errors['mileage'] = 'Veuillez entrer un kilométrage valide ex: 10000';
            }
        }


        try {
            $picture = $_FILES['picture'];
            if ($picture['error'] != 0) {
                throw new Exception("Fichier non envoyé", 1);
            }
            if (!in_array($picture['type'], VALID_EXTENSIONS)) {
                throw new Exception("Mauvaise extension de fichier", 2);
            }
            if ($picture['size'] >= FILE_SIZE) {
                throw new Exception("Taille du fichier dépassé", 3);
            }
            $extension = pathinfo($picture['name'], PATHINFO_EXTENSION);
            $newNameFile = uniqid('img_') . '.' . $extension;
            $from = $picture['tmp_name'];
            $to = __DIR__ . '/../../../public/uploads/vehicles/' . $newNameFile;
            move_uploaded_file($from, $to);
        } catch (\Throwable $th) {
            $errors['picture'] = $th->getMessage();
        }

        if (empty($errors)) {
            $vehicleObj = new Vehicle();
            $vehicleObj->set_id_types($id_types);
            $vehicleObj->set_brand($brand);
            $vehicleObj->set_model($model);
            $vehicleObj->set_registration($registration);
            $vehicleObj->set_mileage($mileage);
            $vehicleObj->set_picture($newNameFile);
            $isSaved = $vehicleObj->insert();
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
