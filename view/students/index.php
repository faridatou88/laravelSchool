<?php
require_once __DIR__ . '../config/provider.php';
require_once __DIR__ . '/../../model/studentModel.php';



// Charger les salles disponibles pour la sélection dynamique
$salle = new Salle();
$SalleData = $salle->getAllSalles();

$studentModel = new Student();
$studentsData = $studentModel->getAllStudents();

// Charger les étudiants

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Étudiants</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .table-container {
      margin-top: 50px;
    }
  </style>
</head>
<body>

<header class="bg-dark text-white py-3">
  <div class="container d-flex justify-content-between align-items-center">
    <h1 class="h3">Gestion d'École</h1>
    <nav>
      <a href="#" class="text-white me-3">Accueil</a>
      <a href="#" class="text-white">Contact</a>
    </nav>
  </div>
</header>

<div class="container table-container">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="text-primary">Gestion des Étudiants</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
      <i class="bi bi-plus-circle me-2"></i>Ajouter un étudiant
    </button>
  </div>

  <!-- Table des Étudiants -->
  <table class="table table-striped table-hover">
    <thead class="table-primary">
      <tr>
        <th>ID</th>
        <th>Matricule</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de Naissance</th>
        <th>Lieu de Naissance</th>
        <th>Nationalité</th>
        <th>Adresse</th>
        <th>Téléphone</th>
        <th>Salle</th>
        <th>Date de Création</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($studentsData as $student): ?>
        <tr>
          <td><?= htmlspecialchars($student['idStudent']); ?></td>
          <td><?= htmlspecialchars($student['studentMat']); ?></td>
          <td><?= htmlspecialchars($student['nom']); ?></td>
          <td><?= htmlspecialchars($student['prenom']); ?></td>
          <td><?= htmlspecialchars($student['datenaiss']); ?></td>
          <td><?= htmlspecialchars($student['lieunaiss']); ?></td>
          <td><?= htmlspecialchars($student['nationality']); ?></td>
          <td><?= htmlspecialchars($student['adresse']); ?></td>
          <td><?= htmlspecialchars($student['numTel']); ?></td>
          <td><?= htmlspecialchars($student['nomSalle']); ?></td>
          <td><?= htmlspecialchars($student['created_at']); ?></td>
          <td>
            <button class="btn btn-sm btn-warning"><i class="bi bi-pencil-fill"></i> Modifier</button>
            <button class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i> Supprimer</button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- Modal pour ajouter un étudiant -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStudentModalLabel">Ajouter un nouvel étudiant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addStudentForm" action="../../controllers/studentctrl.php" method="POST">
          <div class="mb-3">
            <label for="studentMat" class="form-label">Matricule</label>
            <input type="text" class="form-control" id="studentMat" name="studentMat" required>
          </div>
          <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
          </div>
          <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
          </div>
          <div class="mb-3">
            <label for="datenaiss" class="form-label">Date de Naissance</label>
            <input type="date" class="form-control" id="datenaiss" name="datenaiss" required>
          </div>
          <div class="mb-3">
            <label for="lieunaiss" class="form-label">Lieu de Naissance</label>
            <input type="text" class="form-control" id="lieunaiss" name="lieunaiss" required>
          </div>
          <div class="mb-3">
            <label for="nationality" class="form-label">Nationalité</label>
            <input type="text" class="form-control" id="nationality" name="nationality" required>
          </div>
          <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" required>
          </div>
          <div class="mb-3">
            <label for="numTel" class="form-label">Téléphone</label>
            <input type="text" class="form-control" id="numTel" name="numTel" required>
          </div>
          <div class="mb-3">
            <label for="idsalle" class="form-label">Salle</label>
            <select class="form-select" id="idsalle" name="idsalle">
              <option value="" selected>Aucune</option>
              <?php foreach ($SalleData as $salle): ?>
                <option value="<?= $salle['idsalle']; ?>">
                  <?= htmlspecialchars($salle['nom'] . ' ' . $salle['numSalle']); ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <button type="submit" name="addStudent" class="btn btn-primary">Ajouter</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
