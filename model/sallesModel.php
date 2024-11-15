<?php
require_once __DIR__ . '/../config/provider.php';

class Salle {
    private $connexion;

    public function __construct(){
        $this->connexion = Database::connect(); // Appel direct de la méthode statique
    }

    // Ajouter une salle
    public function addSalle($nom, $numSalle) {
        $query = "INSERT INTO salle(nom, numSalle) VALUES (:nom, :numSalle)";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute([
            "nom" => $nom,
            "numSalle" => $numSalle
        ]);
        return $stmt->rowCount();
    }

    // Récupérer toutes les salles
    public function getAllSalles() {
        $query = "SELECT * FROM salle";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer une salle par ID
    public function getSalleById($id) {
        $query = "SELECT * FROM salles WHERE idSalle = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour les informations d'une salle
    public function updateSalle($id, $nom, $numSalle) {
        $query = "UPDATE salles SET nom = :nom, numSalle = :numSalle WHERE idSalle = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute([
            "nom" => $nom,
            "numSalle" => $numSalle,
            "id" => $id
        ]);
        return $stmt->rowCount();
    }

    // Supprimer une salle
    public function deleteSalle($id) {
        $query = "DELETE FROM salle WHERE idsalle = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount();
    }
}
