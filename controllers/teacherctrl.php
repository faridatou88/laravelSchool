<?php
require_once __DIR__ . '/../config/provider.php';
require_once __DIR__ . '/../model/sallesModel.php';
require_once __DIR__ . '/../model/teacherModel.php';


if(isset($_GET['id'])) {
    $id=$_GET['id'];

    $teacher = new Teacher();
    $delete = $teacher->deleteTeacher($id);
    if ($delete) {
        header('Location: ../view/teachers/index.php');
        exit();
    }
    # code...
}

if (isset($_POST['addTeacher'])) {
    $matricule = htmlspecialchars($_POST['teacherMat']);
    $nom= htmlspecialchars($_POST['nom']);
    $prenom= htmlspecialchars($_POST['prenom']);
    $datenaiss= htmlspecialchars($_POST['datenaiss']);
    $adresse= htmlspecialchars($_POST['adresse']);
    $numTel= htmlspecialchars($_POST['numTel']);
    $idsalle= htmlspecialchars($_POST['idsalle']);

    $teacher = new Teacher();
    $addTeacher= $teacher->addTeacher($matricule,$nom,$prenom,$datenaiss,$adresse,$numTel,$idsalle);

    if($addTeacher){
        header("Location:../view/teachers/");
    }
}

