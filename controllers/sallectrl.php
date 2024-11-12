<?php
require_once("../config/provider.php");
include("..sallesModel.php");

//ajoutSalle
if(isset($_POST['addclass'])) {
    $nom = htmlspecialchars($_POST['nomSalle']);
    $numSalle = htmlspecialchars($_POST['numSalle']);

    $salle = new Salle();
    $result = $salle->addSalle($nom, $numSalle);

    if($result > 0) {
        echo "ewgeg";
        header('Location: ../index.php');
    } else {
        echo "Erreur lors de l'ajout de la salle.";
    }
}