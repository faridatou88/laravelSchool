<?php
require_once __DIR__ . '/../config/provider.php';
require_once __DIR__ . '/../controllers/sallectrl.php';
require_once __DIR__ . '/../model/sallesModel.php';


// ajoutSalle
if (isset($_POST['addSalle'])) {
    $nom = htmlspecialchars($_POST['nomSalle']);
    $numSalle = htmlspecialchars($_POST['numSalle']);
    echo $nom;

    $salle = new Salle();
    $result = $salle->addSalle($nom, $numSalle);

    if ($result > 0) {
        header('Location: ../index.php');
        exit; // Stoppe l'exécution après redirection
    } else {
        echo "Erreur lors de l'ajout de la salle.";
    }
}
