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
    $dateCreated = $vehicle->created_at;
    $date = new DateTime($dateCreated);
    $dateFormated = $date->format('d-m-Y');

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($firstname)) {
            $errors['firstname'] = 'Veuillez obligatoirement entrer un prénom';
        } else {
            if (!preg_match(REGEX_NAME, $firstname)) {
                $errors['firstname'] = 'Veuillez entrer un prénom valide';
            }
        }

        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($lastname)) {
            $errors['lastname'] = 'Veuillez obligatoirement entrer un prénom';
        } else {
            if (!preg_match(REGEX_NAME, $lastname)) {
                $errors['lastname'] = 'Veuillez entrer un prénom valide';
            }
        }

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if (empty($email)) {
            $errors['email'] = 'Veuillez obligatoirement entrer un email';
        } else {
            $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
            if ($isOk == false) {
                $errors['email'] = 'Veuillez entre un email valide';
            }
        }

        $birthdate = filter_input((INPUT_POST), 'birthdate', FILTER_SANITIZE_NUMBER_INT);
        if (empty($birthdate)) {
            $errors['birthdate'] = 'Veuillez entrer votre date d\'anniversaire';
        } else {
            $date = DateTime::createFromFormat('Y-m-d', $birthdate);
            $currentDate = new DateTime();

            if (!$date || $date->format('Y-m-d') !== $birthdate || $date > $currentDate) {
                $errors['birthdate'] = "* Veuillez entrer une date de naissance valide et inférieure à la date d'aujourd'hui.";
            }
        }

        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($phone)) {
            $errors['phone'] = 'Veuillez obligatoirement entrer un prénom';
        } else {
            if (!preg_match(REGEX_PHONE, $phone)) {
                $errors['phone'] = 'Veuillez entrer un prénom valide';
            }
        }

        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_NUMBER_INT);
    }
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
