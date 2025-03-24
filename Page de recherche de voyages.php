<?php
require_once '../../includes/config.php';
require_once '../../includes/auth.php';

$pageTitle = 'Inscription - O’Bitoun Travel';

// Redirection si déjà connecté
if (isLoggedIn()) {
    header('Location: /index.php');
    exit;
}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm-password'] ?? '';
    
    // Validation
    if (empty($nom)) $errors['nom'] = 'Le nom est requis';
    if (empty($prenom)) $errors['prenom'] = 'Le prénom est requis';
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Email invalide';
    if (strlen($password) < 8) $errors['password'] = 'Le mot de passe doit faire au moins 8 caractères';
    if ($password !== $confirmPassword) $errors['confirm-password'] = 'Les mots de passe ne correspondent pas';
    
    if (empty($errors)) {
        $userData = [
            'username' => $prenom . ' ' . $nom,
            'email' => $email,
            'password' => $password,
            'first_name' => $prenom,
            'last_name' => $nom
        ];
        
        if (registerUser($userData)) {
            header('Location: /index.php');
            exit;
        } else {
            $errors['email'] = 'Cet email est déjà utilisé';
        }
    }
}

ob_start();
?>
<?php include '../../includes/header.php'; ?>

<section class="form-section">
    <h2>Inscription</h2>
    <?php if (!empty($errors)): ?>
        <div class="alert alert-error">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <form action="/pages/auth/register.php" method="POST" class="form-container">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($_POST['nom'] ?? ''); ?>" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($_POST['prenom'] ?? ''); ?>" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm-password">Confirmer le mot de passe :</label>
        <input type="password" id="confirm-password" name="confirm-password" required>

        <button type="submit" class="btn">S'inscrire</button>
    </form>
    <p>Déjà un compte ? <a href="/pages/auth/login.php">Connectez-vous</a></p>
</section>

<?php
include '../../includes/footer.php';
?>
