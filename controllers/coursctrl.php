<?php 
require_once __DIR__ . '/../config/provider.php';
require_once __DIR__ . '/../controllers/sallectrl.php';
require_once __DIR__ . '/../model/coursModel.php';

if (isset($_POST["addCourse"])) {
    // Récupération des données du formulaire
    $nomCours = $_POST['nomCours'];
    $nbreHeure = $_POST['nbreHeure'];
    $idSalle = $_POST['idsalle'];

    // Créer une instance de la classe Cours et insérer les données
    $coursModel = new Cours();
    $insertion = $coursModel->addCours($nomCours, $nbreHeure, $idSalle);

    if ($insertion) {
        header("Location: ../index.php");
    } else {
        echo "Échec de l'insertion du cours.";
    }
}
