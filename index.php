<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion d'École</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <style>
    .hero-section {
      background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url('farida.jpg') center/cover;
      color: white;
      padding: 100px 0;
      text-align: center;
    }
    .card:hover {
      transform: scale(1.05);
      transition: 0.3s;
    }
    .icon-box {
      font-size: 3rem;
      color: #007bff;
    }
  </style>
</head>
<body>

  <!-- Section d'en-tête -->
  <header class="bg-dark text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
      <h1 class="h3">Gestion d'École</h1>
      <nav>
        <a href="view/students/" class="text-white me-3">inscription</a>
        <a href="view/teachers/" class="text-white me-3">enseignants</a>
        <a href="view/salles/" class="text-white">salles</a>
        <a href="view/cours/" class="text-white">cours</a>
        
      </nav>
    </div>
  </header>

  <!-- Section Hero -->
  <section class="hero-section">
    <div class="container">
      <h2>Bienvenue dans votre espace de gestion scolaire</h2>
      <p>Un outil complet et intuitif pour gérer efficacement toutes les informations scolaires.</p>
      <a href="#" class="btn btn-primary btn-lg mt-3">Découvrir</a>
    </div>
  </section>

  <!-- Section Fonctionnalités -->
  <section class="py-5">
    <div class="container">
      <div class="row text-center">
        <h2 class="mb-4">Fonctionnalités Princi pales</h2>
        <div class="col-md-4 mb-4">
          <div class="card shadow-sm p-4">
            <div class="icon-box mb-3">
              <i class="bi bi-person-fill"></i>
            </div>
            <h5 class="card-title">Gestion des Étudiants</h5>
            <p class="card-text">Ajouter, modifier, et supprimer des informations d'étudiants facilement.</p>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card shadow-sm p-4">
            <div class="icon-box mb-3">
              <i class="bi bi-journal-bookmark-fill"></i>
            </div>
            <h5 class="card-title">Suivi des Classes</h5>
            <p class="card-text">Organiser les classes et suivre les progrès académiques.</p>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card shadow-sm p-4">
            <div class="icon-box mb-3">
              <i class="bi bi-card-checklist"></i>
            </div>
            <h5 class="card-title">Gestion des Inscriptions</h5>
            <p class="card-text">Suivi simplifié des inscriptions et des informations administratives.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section de Pied de Page -->
  <footer class="bg-dark text-white py-4">
    <div class="container text-center">
      <p>&copy; 2023 - Gestion d'École. Tous droits réservés.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
