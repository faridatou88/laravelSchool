<?php

class Database {
    private static $host = 'localhost';
    private static $dbname = 'laravelSchool';
    private static $username = 'root';
    private static $password = 'root';

    // Méthode statique pour se connecter à la base de données
    public static function connect() {
        try {
            // Créer une nouvelle connexion PDO
            $pdo = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8", self::$username, self::$password);
            // Définir le mode d'erreur de PDO
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            // Afficher un message d'erreur en cas de problème de connexion
            die("Erreur de connexion : " . $e->getMessage());
        }
    }
}

// Appeler la méthode statique sans instancier la classe
$db = Database::connect();
