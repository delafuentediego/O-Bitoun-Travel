<?php
require_once __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    if ($password !== $confirmPassword) {
        die("Les mots de passe ne correspondent pas. <a href='../html/inscription.html'>Retour</a>");
    }

    $users = read_users();

    foreach ($users as $user) {
        if ($user['email'] === $email) {
            die("Cet email est déjà utilisé. <a href='../html/inscription.html'>Retour</a>");
        }
    }

    $newUser = [
        'id' => count($users) + 1,
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'role' => 'user',
        'inscription_date' => date('Y-m-d H:i:s')
    ];

    $users[] = $newUser;
    write_users($users);

    header("Location: ../html/connexion.html");
    exit;
} else {
    header("Location: ../html/inscription.html");
    exit;
}
?>
