
<?php 
require_once __DIR__ . '/../config/provider.php';
require_once __DIR__ . '/../controllers/sallectrl.php';
require_once __DIR__ . '/../model/coursModel.php';

if (isset($_POST["addCourse"])) {
    $cours = $_POST['nomCours'];
    $nbreHeure = $_POST['nbreHeure'];
    $idSalle = $_POST['idSalle'];


    $cours= new Cours();
    $insertion = $cours->addCours($cours,$nbreHeure,$idSalle);

    if ($insertion) {
        header("Location: ../index.php");
    }else{
        echo"vous allez lire l'heure";
    }
}