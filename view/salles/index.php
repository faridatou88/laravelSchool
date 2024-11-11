<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Salles de Classe</title>
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
      <h2 class="text-primary">Gestion des Salles de Classe</h2>
      <!-- Bouton pour ouvrir le modal d'ajout -->
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoomModal">
        <i class="bi bi-plus-circle me-2"></i>Ajouter une salle
      </button>
    </div>

    <!-- Table des Salles de Classe -->
    <table class="table table-striped table-hover">
      <thead class="table-primary">
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Numéro de Salle</th>
          <th>Date de Création</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Les lignes des salles de classe seront insérées ici dynamiquement via PHP -->
        <tr>
          <td>1</td>
          <td>Salle A</td>
          <td>101</td>
          <td>2024-11-11 10:00:00</td>
          <td>
            <button class="btn btn-sm btn-warning">
              <i class="bi bi-pencil-fill"></i> Modifier
            </button>
            <button class="btn btn-sm btn-danger">
              <i class="bi bi-trash-fill"></i> Supprimer
            </button>
          </td>
        </tr>
        <!-- Autres salles de classe... -->
      </tbody>
    </table>
  </div>

  <!-- Modal pour ajouter une salle de classe -->
  <div class="modal fade" id="addRoomModal" tabindex="-1" aria-labelledby="addRoomModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addRoomModalLabel">Ajouter une nouvelle salle</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addRoomForm">
            <div class="mb-3">
              <label for="roomName" class="form-label">Nom de la Salle</label>
              <input type="text" class="form-control" id="roomName" required>
            </div>
            <div class="mb-3">
              <label for="roomNumber" class="form-label">Numéro de Salle</label>
              <input type="text" class="form-control" id="roomNumber" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Placeholder pour gérer la soumission du formulaire
    document.getElementById('addRoomForm').addEventListener('submit', function(event) {
      event.preventDefault();
      alert('Nouvelle salle ajoutée avec succès!');
      // Insère le code ici pour ajouter la salle via PHP ou JavaScript dynamique
      // Ferme le modal après la soumission
      const modal = bootstrap.Modal.getInstance(document.getElementById('addRoomModal'));
      modal.hide();
    });
  </script>
</body>
</html>
