<?php 
require_once __DIR__ . '/../../config/provider.php';
require_once __DIR__ . '/../../model/sallesModel.php';
require_once __DIR__ . '/../../model/coursModel.php';

$salle = new Salle();
$SalleData = $salle->getAllSalles();

$cours = new Cours();
$coursData = $cours->getAllCours();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Cours</title>
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
  <header class="bg-dark text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
      <h1 class="h3">Gestion d'École</h1>
      <nav>
        <a href="#" class="text-white me-3">Accueil</a>
        <a href="#" class="text-white me-3">Fonctionnalités</a>
        <a href="#" class="text-white">Contact</a>
      </nav>
    </div>
  </header>

  <!-- Container principal -->
  <div class="container table-container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="text-primary">Gestion des Cours</h2>
      <!-- Bouton pour ouvrir le modal d'ajout -->
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourseModal">
        <i class="bi bi-plus-circle me-2"></i>Ajouter un cours
      </button>
    </div>

    <!-- Table des Cours -->
    <table class="table table-striped table-hover">
      <thead class="table-primary">
        <tr>
          <th>ID</th>
          <th>Nom du Cours</th>
          <th>Nombre d'Heures</th>
          <th>ID Salle</th>
          <th>Date de Création</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
         <?php foreach ($coursData as $cours): ?>
        <tr>
          <td><?= htmlspecialchars($cours['idCours']) ?></td>
          <td><?= htmlspecialchars($cours['nomCours']) ?></td>
          <td><?= htmlspecialchars($cours['nbreHeure']) ?></td>
          <td><?= htmlspecialchars($cours['idsalle']) ?></td>
          <td><?= htmlspecialchars($cours['created_at']) ?></td>
          <td>
            <button class="btn btn-sm btn-warning">
              <i class="bi bi-pencil-fill"></i> Modifier
            </button>
            <button class="btn btn-sm btn-danger">
              <i class="bi bi-trash-fill"></i> Supprimer
            </button>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Modal pour ajouter un cours -->
  <div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addCourseModalLabel">Ajouter un nouveau cours</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="courseForm" action="../../controllers/coursctrl.php" method="POST">
            <div class="mb-3">
              <label for="nomCours" class="form-label">Nom du Cours</label>
              <input type="text" class="form-control" id="nomCours" name="nomCours" required>
            </div>
            <div class="mb-3">
              <label for="nbreHeure" class="form-label">Nombre d'Heures</label>
              <input type="number" class="form-control" id="nbreHeure" name="nbreHeure" value="3" required>
            </div>
            <div class="mb-3">
              <label for="idsalle" class="form-label">ID Salle</label>
              <select class="form-select" id="idsalle" name="idsalle">
                <option value="" selected>Aucune</option>
                <?php foreach ($SalleData as $salle): ?>
                  <option value="<?= htmlspecialchars($salle['idsalle']); ?>"><?= htmlspecialchars($salle['idsalle'] . ' - ' . $salle['nom'] . ' ' . $salle['numSalle']); ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <input type="submit" name="addCourse" value="Ajouter" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
