<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'O’Bitoun Travel'; ?></title>
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;600&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1 class="main-title">O’Bitoun Travel</h1>
        <nav>
            <ul>
                <li><a href="/index.php" <?php echo basename($_SERVER['PHP_SELF']) === 'index.php' ? 'class="active"' : ''; ?>>Accueil</a></li>
                <li><a href="/presentation.php" <?php echo basename($_SERVER['PHP_SELF']) === 'presentation.php' ? 'class="active"' : ''; ?>>Présentation</a></li>
                <li><a href="/pages/trips/search.php" <?php echo basename($_SERVER['PHP_SELF']) === 'search.php' ? 'class="active"' : ''; ?>>Rechercher un voyage</a></li>
                
                <?php if (!isLoggedIn()): ?>
                    <li><a href="/pages/auth/register.php" <?php echo basename($_SERVER['PHP_SELF']) === 'register.php' ? 'class="active"' : ''; ?>>Inscription</a></li>
                    <li><a href="/pages/auth/login.php" <?php echo basename($_SERVER['PHP_SELF']) === 'login.php' ? 'class="active"' : ''; ?>>Connexion</a></li>
                <?php else: ?>
                    <li><a href="/pages/user/profile.php" <?php echo basename($_SERVER['PHP_SELF']) === 'profile.php' ? 'class="active"' : ''; ?>>Profil</a></li>
                    <?php if (isAdmin()): ?>
                        <li><a href="/pages/admin/index.php" <?php echo basename($_SERVER['PHP_SELF']) === 'index.php' && strpos($_SERVER['REQUEST_URI'], 'admin') !== false ? 'class="active"' : ''; ?>>Admin</a></li>
                    <?php endif; ?>
                    <li><a href="/logout.php">Déconnexion</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
