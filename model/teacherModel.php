<?php
require_once("config/provider.php");

class Teacher {
    private $connexion;

    function __construct(){
        $db = new Database();
        $this->connexion = $db->connect();
    }

    // Ajouter un enseignant
    public function addTeacher($teacherMat, $nom, $prenom, $datenaiss, $genre, $adresse, $numtel, $idsalle) {
        $query = "INSERT INTO teachers (teacherMat, nom, prenom, datenaiss, genre, adresse, numTel, idsalle)
                  VALUES (:teacherMat, :nom, :prenom, :datenaiss, :genre, :adresse, :numtel, :idsalle)";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute([
            "teacherMat" => $teacherMat,
            "nom" => $nom,
            "prenom" => $prenom,
            "datenaiss" => $datenaiss,
            "genre" => $genre,
            "adresse" => $adresse,
            "numtel" => $numtel,
            "idsalle" => $idsalle
        ]);
        return $stmt->rowCount();
    }

    // Récupérer tous les enseignants
    public function getAllTeachers() {
        $query = "SELECT * FROM teachers";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un enseignant par ID
    public function getTeacherById($id) {
        $query = "SELECT * FROM teachers WHERE idTeacher = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour les informations d'un enseignant
    public function updateTeacher($id, $teacherMat, $nom, $prenom, $datenaiss, $genre, $adresse, $numtel, $idsalle) {
        $query = "UPDATE teachers SET teacherMat = :teacherMat, nom = :nom, prenom = :prenom, datenaiss = :datenaiss,
                  genre = :genre, adresse = :adresse, numTel = :numtel, idsalle = :idsalle WHERE idTeacher = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute([
            "teacherMat" => $teacherMat,
            "nom" => $nom,
            "prenom" => $prenom,
            "datenaiss" => $datenaiss,
            "genre" => $genre,
            "adresse" => $adresse,
            "numtel" => $numtel,
            "idsalle" => $idsalle,
            "id" => $id
        ]);
        return $stmt->rowCount();
    }

    // Supprimer un enseignant
    public function deleteTeacher($id) {
        $query = "DELETE FROM teachers WHERE idTeacher = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount();
    }
}
