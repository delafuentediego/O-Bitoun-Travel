<?php
require_once __DIR__ . '/../includes/config.php';
$voyages = read_voyages();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>O’Bitoun Travel - Tous les Voyages</title>
  <link rel="stylesheet" href="../../css/styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;600&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <h1 class="main-title">O’Bitoun Travel</h1>
    <nav>
      <ul>
        <li><a href="../index.html">Accueil</a></li>
        <li><a href="../presentation.html">Présentation</a></li>
        <li><a href="../recherche.html">Rechercher un voyage</a></li>
        <li><a href="../inscription.html">Inscription</a></li>
        <li><a href="../connexion.html">Connexion</a></li>
        <li><a href="../profil.html">Profil</a></li>
        <li><a href="../admin.html">Admin</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <h2>Tous les Voyages</h2>
    <table border="1" cellpadding="10" cellspacing="0">
      <thead>
        <tr>
          <th>Titre</th>
          <th>Date début</th>
          <th>Date fin</th>
          <th>Durée</th>
          <th>Étapes</th>
          <th>Spécificités</th>
          <th>Personnes</th>
          <th>Prix Total</th>
          <th>Statut</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($voyages as $voyage): ?>
        <tr>
          <td><?php echo htmlspecialchars($voyage['titre']); ?></td>
          <td><?php echo htmlspecialchars($voyage['date_debut']); ?></td>
          <td><?php echo htmlspecialchars($voyage['date_fin']); ?></td>
          <td><?php echo htmlspecialchars($voyage['duree']); ?></td>
          <td><?php echo htmlspecialchars(implode(", ", $voyage['etapes'])); ?></td>
          <td><?php echo htmlspecialchars($voyage['specificites']); ?></td>
          <td><?php echo htmlspecialchars(implode(", ", $voyage['personnes'])); ?></td>
          <td><?php echo htmlspecialchars($voyage['prix_total']); ?> €</td>
          <td><?php echo htmlspecialchars($voyage['statut']); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <br>
    <a href="../recherche.html" class="btn">Retour à la recherche</a>
  </main>
  <footer>
    <p>&copy; 2025 O’Bitoun Travel - Tous droits réservés</p>
  </footer>
</body>
</html>
