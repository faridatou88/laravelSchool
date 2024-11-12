<?php
require_once __DIR__ . '/../../config/provider.php';
require_once __DIR__ . '/../../model/sallesModel.php';
$salle = new Salle();
$SalleData = $salle->getAllSalles();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Enseignants</title>
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

  <!-- Barre de navigation -->
  <header class="bg-light py-3">
    <div class="container d-flex justify-content-between align-items-center">
      <h1 class="h3 text-primary">Gestion d'École</h1>
      <nav>
        <a href="#" class="text-dark me-3">Accueil</a>
        <a href="#" class="text-dark me-3">Étudiants</a>
        <a href="#" class="text-dark">Enseignants</a>
      </nav>
    </div>
  </header>

  <!-- Container principal -->
  <div class="container table-container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="text-primary">Gestion des Enseignants</h2>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTeacherModal">
        <i class="bi bi-plus-circle me-2"></i>Ajouter un enseignant
      </button>
    </div>

    <!-- Table des Enseignants -->
    <table class="table table-striped table-hover">
      <thead class="table-primary">
        <tr>
          <th>ID</th>
          <th>Matricule</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Date de Naissance</th>
          <th>Adresse</th>
          <th>Téléphone</th>
          <th>Salle</th>
          <th>Date de Création</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Les lignes des enseignants seront insérées ici dynamiquement via PHP -->
      </tbody>
    </table>
  </div>

  <!-- Modal pour ajouter un enseignant -->
  <div class="modal fade" id="addTeacherModal" tabindex="-1" aria-labelledby="addTeacherModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addTeacherModalLabel">Ajouter un nouvel enseignant</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addTeacherForm" action="../../controllers/teacherctrl.php" method="POST">
            <div class="mb-3">
              <label for="teacherMat" class="form-label">Matricule</label>
              <input type="text" class="form-control" id="teacherMat" name="teacherMat" required>
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
                    <?= htmlspecialchars($salle['idsalle'] . ' - ' . $salle['nom'] . ' ' . $salle['numSalle']); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <button type="submit " name="addTeacher" class="btn btn-primary">Ajouter</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 
</body>
</html>
