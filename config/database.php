<?php

require_once __DIR__ . '/../config/constants.php';

class Database
{
    private static $pdo;


    public static function connect()
    {
        if (self::$pdo == null) {
            try {
                self::$pdo = new PDO(DSN, USER, PWD);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                die("Erreur : " . $e->getMessage());
            };
        }

        return self::$pdo;
    }
}
