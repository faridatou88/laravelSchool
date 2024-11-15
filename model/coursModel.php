<?php
require_once __DIR__ . '/../config/provider.php';
require_once __DIR__ . '/../controllers/sallectrl.php';
require_once __DIR__ . '/../model/sallesModel.php';

class Cours {
    private $connexion;

    function __construct(){
        $db = new Database();
        $this->connexion = Database::connect();
    }

    // Ajouter un cours
    public function addCours($nomCours, $nbreHeure, $idsalle) {
        $query = "INSERT INTO cours(nomCours, nbreHeure, idsalle) VALUES (:nomCours, :nbreHeure, :idsalle)";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute([
            ":nomCours" => $nomCours,
            ":nbreHeure" => $nbreHeure,
            ":idsalle" => $idsalle
        ]);
        return $stmt->rowCount();
    }

    // Récupérer tous les cours
    public function getAllCours() {
        $query = "SELECT * FROM cours";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un cours par ID
    public function getCoursById($id) {
        $query = "SELECT * FROM cours WHERE idCours = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour les informations d'un cours
    public function updateCours($id, $nomCours, $idTeacher, $idsalle) {
        $query = "UPDATE cours SET nomCours = :nomCours, idTeacher = :idTeacher, idsalle = :idsalle WHERE idCours = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute([
            "nomCours" => $nomCours,
            "idTeacher" => $idTeacher,
            "idsalle" => $idsalle,
            "id" => $id
        ]);
        return $stmt->rowCount();
    }

    // Supprimer un cours
    public function deleteCours($id) {
        $query = "DELETE FROM cours WHERE idCours = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount();
    }
}
