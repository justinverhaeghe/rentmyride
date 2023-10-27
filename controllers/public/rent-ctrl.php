<?php

require_once __DIR__ . '/../../helpers/dd.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/constants.php';
require_once __DIR__ . '/../../models/Vehicle.php';
require_once __DIR__ . '/../../models/Client.php';
require_once __DIR__ . '/../../models/Rent.php';

try {
    $title = 'RENT MY RIDE - Réserver un véhicule';
    $style = 'rent';
    $description = "Préparez-vous à vivre l'aventure de votre vie en réservant un véhicule avec Rent My Ride. Notre plateforme conviviale vous permet de choisir parmi une variété de véhicules, qu'il s'agisse de berlines élégantes, de supercars puissantes ou de compactes pratiques. Avec une réservation simple et transparente, nous vous offrons la liberté de découvrir le monde à votre rythme. Réservez dès maintenant et préparez-vous à prendre la route avec Rent My Ride.";
    $id_vehicles = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $vehicle = Vehicle::get($id_vehicles);
    $dateCreated = $vehicle->created_at;
    $dateNow = new DateTime($dateCreated);
    $dateFormated = $dateNow->format('d-m-Y');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($firstname)) {
            $errors['firstname'] = 'Veuillez obligatoirement entrer un prénom';
        } else {
            if (!preg_match('/' . REGEX_NAME . '/', $firstname)) {
                $errors['firstname'] = 'Veuillez entrer un prénom valide';
            }
        }

        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($lastname)) {
            $errors['lastname'] = 'Veuillez obligatoirement entrer un nom';
        } else {
            if (!preg_match('/' . REGEX_NAME . '/', $lastname)) {
                $errors['lastname'] = 'Veuillez entrer un nom valide';
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

        $birthday = filter_input((INPUT_POST), 'birthday', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($birthday)) {
            $errors['birthday'] = 'Veuillez entrer votre date d\'anniversaire';
        } else {
            $date = DateTime::createFromFormat('Y-m-d', $birthday);
            $currentDate = new DateTime();

            if (!$date || $date->format('Y-m-d') !== $birthday || $date > $currentDate) {
                $errors['birthday'] = "* Veuillez entrer une date de naissance valide et inférieure à la date d'aujourd'hui.";
            }
        }

        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($phone)) {
            $errors['phone'] = 'Veuillez obligatoirement entrer un prénom';
        } else {
            if (!preg_match('/' . REGEX_PHONE . '/', $phone)) {
                $errors['phone'] = 'Veuillez entrer un prénom valide';
            }
        }

        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_NUMBER_INT);
        if (empty($zipcode)) {
            $errors['zipcode'] = 'Veuillez obligatoirement entrer un code postal';
        } else {
            if (!preg_match('/' . REGEX_CP . '/', $zipcode)) {
                $errors['zipcode'] = 'Veuillez entrer un code postal valide';
            }
        }

        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($city)) {
            $errors['city'] = 'Veuillez obligatoirement entrer une commune';
        }

        $startdate = filter_input(INPUT_POST, 'startdate', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($startdate)) {
            $errors['startdate'] = 'Veuillez obligatoirement entrer une date de début';
        }

        $enddate = filter_input(INPUT_POST, 'enddate', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($enddate)) {
            $errors['enddate'] = 'Veuillez obligatoirement entrer une date de fin';
        }


        if (empty($errors)) {
            try {
                $pdo = Database::connect();
                $pdo->beginTransaction();

                $client = new Client();
                $client->set_firstname($firstname);
                $client->set_lastname($lastname);
                $client->set_email($email);
                $client->set_birthday($birthday);
                $client->set_phone($phone);
                $client->set_city($city);
                $client->set_zipcode($zipcode);
                $id_clients = $client->insert();

                $rent = new Rent();
                $rent->set_startdate($startdate);
                $rent->set_enddate($enddate);
                $rent->set_id_vehicles($id_vehicles);
                $rent->set_id_clients($id_clients);
                $isInserted = $rent->insert();

                if ($id_clients && $isInserted) {
                    $pdo->commit();
                } else {
                    $pdo->rollBack();
                }
            } catch (\Throwable $e) {
                $pdo->rollBack();
                echo 'Erreur :' . $e->getMessage();
            }
        }
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
