<?php
require_once __DIR__ . '/../config/provider.php';
require_once __DIR__ . '/../controllers/sallectrl.php';
require_once __DIR__ . '/../model/sallesModel.php';



if (isset($_GET['id'])) {
    $id=$_GET['id'];

    $salle = new Salle();
    $delete = $salle->deleteSalle($id);
    if ($delete) {
        header('Location: ../view/salles/index.php');
        exit();
    }
    # code...
}


// ajoutSalle
if (isset($_POST['addSalle'])) {
    $nom = htmlspecialchars($_POST['nomSalle']);
    $numSalle = htmlspecialchars($_POST['numSalle']);
    echo $nom;

    $salle = new Salle();
    $result = $salle->addSalle($nom, $numSalle);

    if ($result > 0) {
        header('Location: ../view/salles/index.php');
        exit; // Stoppe l'exécution après redirection
    } else {
        echo "Erreur lors de l'ajout de la salle.";
    }
}
