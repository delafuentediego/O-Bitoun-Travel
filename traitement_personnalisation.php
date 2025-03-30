<?php
require_once __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des options du formulaire de personnalisation
    $voyage_id      = $_POST['voyage_id'];
    $hebergement    = $_POST['hebergement'];
    $nb_hebergement = $_POST['nb_hebergement'];
    $transport      = $_POST['transport'];
    $nb_transport   = $_POST['nb_transport'];
    $prix_transport = $_POST['prix_transport'];
    $restauration   = $_POST['restauration'];
    $nb_restauration= $_POST['nb_restauration'];
    $vitesse_transport = $_POST['vitesse_transport'];
    
    // Vous pouvez ici enregistrer ces données en session ou dans un fichier
    $_SESSION['personnalisation'] = [
        'voyage_id' => $voyage_id,
        'hebergement' => $hebergement,
        'nb_hebergement' => $nb_hebergement,
        'transport' => $transport,
        'nb_transport' => $nb_transport,
        'prix_transport' => $prix_transport,
        'restauration' => $restauration,
        'nb_restauration' => $nb_restauration,
        'vitesse_transport' => $vitesse_transport
    ];
    
    // Redirection vers la page de paiement
    header("Location: ../html/paiement.html");
    exit;
} else {
    header("Location: ../html/personnalisation.html");
    exit;
}
?>
