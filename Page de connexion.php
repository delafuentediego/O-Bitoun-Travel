<?php
require_once '../../includes/config.php';
require_once '../../includes/auth.php';

$pageTitle = 'Connexion - O’Bitoun Travel';

// Redirection si déjà connecté
if (isLoggedIn()) {
    header('Location: /index.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (loginUser($email, $password)) {
        header('Location: /index.php');
        exit;
    } else {
        $error = 'Email ou mot de passe incorrect';
    }
}

ob_start();
?>
<?php include '../../includes/header.php'; ?>

<section class="form-section">
    <h2>Connexion</h2>
    <?php if ($error): ?>
        <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    
    <form action="/pages/auth/login.php" method="POST" class="form-container">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" class="btn">Se connecter</button>
    </form>
    <p>Pas encore de compte ? <a href="/pages/auth/register.php">Inscrivez-vous</a></p>
</section>

<?php
include '../../includes/footer.php';
?>
