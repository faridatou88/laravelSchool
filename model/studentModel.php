<?php
require_once("config/provider.php");
class students {
    private $connexion;

    function __construct(){
        // On initialise la connexion à la base de données
        $db = new Database();
        $this->connexion = $db->connect();
    }

    public function inscription($matricule,$nom,$prenom,$datenaiss,$lieunaiss,$sexe,$nationality,$adresse,$numtel,$idsalle){
        $inscription = $connexion->prepare("INSERT INTO students (studentMat,nom,prenom,datenaiss,lieunaiss,sexe,nationality,adresse,numtel,idsalle)VALUES(:studentMat,:nom,:prenom,:datenaiss,:lieunaiss,:sexe,:nationality,:adresse,:numtel,:idsalle");
        $add=$inscription->execute([
            "studentMat" => $matricule,
            "nom"=> $nom,
            "prenom"=> $prenom,
            "datenaiss"=> $datenaiss,
            "lieunaiss"=> $lieunaiss,
            "sexe"=> $sexe,
            "nationality"=> $nationality,
            "adresse"=> $adresse,
            "numtel"=> $numtel,
            "idsalle"=> $idsalle,

        ]);
    }
}

+-------------+-------------+------+-----+-------------------+----------------+
| Field       | Type        | Null | Key | Default           | Extra          |
+-------------+-------------+------+-----+-------------------+----------------+
| idStudent   | int(11)     | NO   | PRI | NULL              | auto_increment |
| studentMat  | varchar(20) | NO   | UNI | NULL              |                |
| nom         | varchar(40) | NO   |     | NULL              |                |
| prenom      | varchar(40) | NO   |     | NULL              |                |
| datenaiss   | date        | NO   |     | NULL              |                |
| lieunaiss   | varchar(30) | NO   |     | NULL              |                |
| nationality | varchar(35) | NO   |     | nigerienne        |                |
| adresse     | varchar(30) | NO   |     | NULL              |                |
| numTel      | varchar(30) | NO   | UNI | NULL              |                |
| created_at  | timestamp   | NO   |     | CURRENT_TIMESTAMP |                |
| idsalle     | int(11)     | YES  | MUL | NULL              |                |
+-------------+-------------+------+-----+-------------------+----------------+