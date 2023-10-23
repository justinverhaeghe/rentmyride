<?php

require_once __DIR__ . '/../../helpers/dd.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/constants.php';
require_once __DIR__ . '/../../models/Vehicle.php';

try {
    $title = 'RENT MY RIDE - Réserver un véhicule';
    $style = 'rent';
    $description = "Préparez-vous à vivre l'aventure de votre vie en réservant un véhicule avec Rent My Ride. Notre plateforme conviviale vous permet de choisir parmi une variété de véhicules, qu'il s'agisse de berlines élégantes, de supercars puissantes ou de compactes pratiques. Avec une réservation simple et transparente, nous vous offrons la liberté de découvrir le monde à votre rythme. Réservez dès maintenant et préparez-vous à prendre la route avec Rent My Ride.";
    $id_vehicles = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $vehicle = Vehicle::get($id_vehicles);
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/pages/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/pages/rent.php';
include __DIR__ . '/../../views/templates/footer.php';
