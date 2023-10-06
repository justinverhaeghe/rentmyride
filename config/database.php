<?php

require_once __DIR__ . '/../config/constants.php';


function connect()
{
    try {
        $pdo = new PDO(DSN, USER, PWD);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    };
    return $pdo;
}
