<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/constants.php';
require_once __DIR__ . '/../../models/Vehicle.php';

try {
    $title = 'RENT MY RIDE - Détails des véhicules';
    $style = 'single';
    $description = "Découvrez en détail la Volkswagen Golf 5 - une option parmi notre impressionnante gamme de véhicules chez RENT MY RIDE. Avec une immatriculation QS-519-GV et 250 000 km au compteur, cette Golf 5 est prête pour votre prochaine aventure. Rejoignez-nous et trouvez la voiture parfaite pour vos besoins. RENT MY RIDE - Votre partenaire de confiance pour la location de véhicules.";
    $id_vehicles = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $vehicle = Vehicle::get($id_vehicles);
    $dateCreated = $vehicle->created_at;
    $date = new DateTime($dateCreated);
    $dateFormated = $date->format('d-m-Y');
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/pages/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/pages/single.php';
include __DIR__ . '/../../views/templates/footer.php';
