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

  <!-- Barre de navigation -->
  <header class="bg-light py-3">
    <div class="container d-flex justify-content-between align-items-center">
      <h1 class="h3 text-primary">Gestion d'École</h1>
      <nav>
        <a href="#" class="text-dark me-3">Accueil</a>
        <a href="#" class="text-dark me-3">Étudiants</a>
        <a href="#" class="text-dark">Contact</a>
      </nav>
    </div>
  </header>

  <!-- Container principal -->
  <div class="container table-container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="text-primary">Gestion des Étudiants</h2>
      <!-- Bouton pour ouvrir le modal d'ajout -->
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
        <i class="bi bi-plus-circle me-2"></i>Ajouter un étudiant
      </button>
    </div>

    <!-- Table des Étudiants -->
    <table class="table table-striped table-hover">
      <thead class="table-primary">
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Classe</th>
          <th>Email</th>
          <th>Téléphone</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Les lignes des étudiants seront insérées ici dynamiquement via PHP -->
        <tr>
          <td>1</td>
          <td>Dupont</td>
          <td>Jean</td>
          <td>Terminale</td>
          <td>jean.dupont@example.com</td>
          <td>+33 6 12 34 56 78</td>
          <td>
            <button class="btn btn-sm btn-warning">
              <i class="bi bi-pencil-fill"></i> Modifier
            </button>
            <button class="btn btn-sm btn-danger">
              <i class="bi bi-trash-fill"></i> Supprimer
            </button>
          </td>
        </tr>
        <!-- Autres étudiants... -->
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
          <form id="addStudentForm">
            <div class="mb-3">
              <label for="studentNom" class="form-label">Nom</label>
              <input type="text" class="form-control" id="studentNom" required>
            </div>
            <div class="mb-3">
              <label for="studentPrenom" class="form-label">Prénom</label>
              <input type="text" class="form-control" id="studentPrenom" required>
            </div>
            <div class="mb-3">
              <label for="studentClasse" class="form-label">Classe</label>
              <input type="text" class="form-control" id="studentClasse" required>
            </div>
            <div class="mb-3">
              <label for="studentEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="studentEmail" required>
            </div>
            <div class="mb-3">
              <label for="studentPhone" class="form-label">Téléphone</label>
              <input type="tel" class="form-control" id="studentPhone" required>
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
    document.getElementById('addStudentForm').addEventListener('submit', function(event) {
      event.preventDefault();
      alert('Nouvel étudiant ajouté avec succès!');
      // Insère le code ici pour ajouter l'étudiant via PHP ou JavaScript dynamique
      // Ferme le modal après la soumission
      const modal = bootstrap.Modal.getInstance(document.getElementById('addStudentModal'));
      modal.hide();
    });
  </script>
</body>
</html>
