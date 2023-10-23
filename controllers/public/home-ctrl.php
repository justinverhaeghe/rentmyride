<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/constants.php';
require_once __DIR__ . '/../../models/Vehicle.php';
require_once __DIR__ . '/../../models/Type.php';

try {
    $title = 'RENT MY RIDE - Homepage';
    $description = "Mettez-vous au volant de l'aventure avec Rent My Ride ! Découvrez notre gamme variée de véhicules, de berlines à des supercars, et réservez facilement votre prochaine escapade. Avec Rent My Ride, la location de voitures devient un jeu d'enfant. Explorez notre flotte de véhicules et trouvez la location parfaite, où que vous soyez. Rejoignez-nous dès aujourd'hui et vivez l'expérience Rent My Ride !";
    $style = 'style';
    $script = 'home';

    $id_types = intval(filter_input(INPUT_GET, 'id_types', FILTER_SANITIZE_NUMBER_INT));
    $search = (string) filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
    $currentPage = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));
    if (!$currentPage) {
        $currentPage = 1;
    }
    $parPage = 9;
    $nb_vehicles = Vehicle::countVehicle(id_types: $id_types, search: $search);
    $pages = ceil($nb_vehicles / $parPage);
    $vehicles = Vehicle::get_all(id_types: $id_types, search: $search, page: $currentPage, parPage: $parPage);
    $types =  Type::get_all();
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
