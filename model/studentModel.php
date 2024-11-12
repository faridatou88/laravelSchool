<?php
require_once '../config/provider.php';
class Students {
    private $connexion;

    function __construct(){
        // On initialise la connexion à la base de données
        $db = new Database();
        $this->connexion = $db->connect();
    }

    // Inscription d'un étudiant
    public function inscription($matricule, $nom, $prenom, $datenaiss, $lieunaiss, $nationality, $adresse, $numtel, $idsalle) {
        $query = "INSERT INTO student (studentMat, nom, prenom, datenaiss, lieunaiss, nationality, adresse, numTel, idsalle)
                  VALUES (:studentMat, :nom, :prenom, :datenaiss, :lieunaiss, :nationality, :adresse, :numtel, :idsalle)";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute([
            "studentMat" => $matricule,
            "nom" => $nom,
            "prenom" => $prenom,
            "datenaiss" => $datenaiss,
            "lieunaiss" => $lieunaiss,
            "nationality" => $nationality,
            "adresse" => $adresse,
            "numtel" => $numtel,
            "idsalle" => $idsalle
        ]);
        return $stmt->rowCount(); // Retourne 1 si l'ajout a été réussi
    }

    // Récupérer tous les étudiants
    public function getAllStudents() {
        $query = "SELECT * FROM student";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un étudiant par ID
    public function getStudentById($id) {
        $query = "SELECT * FROM students WHERE idStudent = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour les informations d'un étudiant
    public function updateStudent($id, $matricule, $nom, $prenom, $datenaiss, $lieunaiss, $sexe, $nationality, $adresse, $numtel, $idsalle) {
        $query = "UPDATE students SET studentMat = :studentMat, nom = :nom, prenom = :prenom, datenaiss = :datenaiss,
                  lieunaiss = :lieunaiss, sexe = :sexe, nationality = :nationality, adresse = :adresse, numTel = :numtel, 
                  idsalle = :idsalle WHERE idStudent = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute([
            "studentMat" => $matricule,
            "nom" => $nom,
            "prenom" => $prenom,
            "datenaiss" => $datenaiss,
            "lieunaiss" => $lieunaiss,
            "sexe" => $sexe,
            "nationality" => $nationality,
            "adresse" => $adresse,
            "numtel" => $numtel,
            "idsalle" => $idsalle,
            "id" => $id
        ]);
        return $stmt->rowCount(); // Retourne 1 si la mise à jour a été réussie
    }

    // Supprimer un étudiant
    public function deleteStudent($id) {
        $query = "DELETE FROM students WHERE idStudent = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount(); // Retourne 1 si la suppression a été réussie
    }
}
