<?php
require_once __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $voyage_id   = $_POST['voyage_id'];
    $card_number = trim($_POST['card_number']);
    $card_owner  = trim($_POST['card_owner']);
    $expiry_date = trim($_POST['expiry_date']);
    $cvv         = trim($_POST['cvv']);

    // Vérifications supplémentaires possibles...
    if (!isset($_SESSION['user'])) {
        die("Vous devez être connecté pour effectuer un paiement. <a href='../html/connexion.html'>Se connecter</a>");
    }
    $user = $_SESSION['user'];

    $transaction = [
        'transaction_id' => uniqid('tx_'),
        'user_id' => $user['id'],
        'voyage_id' => $voyage_id,
        'card_owner' => $card_owner,
        'card_number' => substr($card_number, -4),
        'expiry_date' => $expiry_date,
        'date_transaction' => date('Y-m-d H:i:s')
    ];

    $transactions = read_transactions();
    $transactions[] = $transaction;
    write_transactions($transactions);

    echo "<h2>Paiement effectué avec succès !</h2>";
    echo "<p>Merci, " . htmlspecialchars($card_owner) . ". Votre transaction (" . htmlspecialchars($transaction['transaction_id']) . ") a été enregistrée le " . htmlspecialchars($transaction['date_transaction']) . ".</p>";
    echo "<p><a href='../html/index.html'>Retour à l'accueil</a></p>";
} else {
    header("Location: ../html/paiement.html");
    exit;
}
?>
