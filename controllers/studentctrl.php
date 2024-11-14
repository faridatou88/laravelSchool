<?php
require_once __DIR__ . '/../config/provider.php';
require_once __DIR__ . '/../controllers/sallectrl.php';
require_once __DIR__ . '/../model/studentModel.php';


if (isset($_GET['id'])) {
    $id=$_GET['id'];

    $student = new Students();
    $delete = $student->deleteStudent($id);
    if ($delete) {
        header('Location: ../view/students/index.php');
        exit();
    }
    # code...
}

// Vérifier l'action demandée via le formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addStudent'])) {
        // Récupérer et sécuriser les données du formulaire
        $studentMat = htmlspecialchars($_POST['studentMat']);
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $datenaiss = $_POST['datenaiss'];              
        $lieunaiss = htmlspecialchars($_POST['lieunaiss']);
        $nationality = htmlspecialchars($_POST['nationality']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $numTel = htmlspecialchars($_POST['numTel']);
        $idsalle = !empty($_POST['idsalle']) ? $_POST['idsalle'] : null;

        // Ajouter un nouvel étudiant
        $student = new Students();
        $result=$student->inscription($studentMat, $nom, $prenom, $datenaiss, $lieunaiss, $nationality, $adresse, $numTel, $idsalle);
        
        // Rediriger vers la page des étudiants
        header('Location: ../view/students/index.php');
        exit();
    }
    
    // Ajouter les actions pour modifier et supprimer ici (si nécessaires)
}

// Redirection en cas d'accès direct
header('Location: ../view/students/index.php');
exit();
