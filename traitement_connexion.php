<?php
require_once __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $users = read_users();

    foreach ($users as $user) {
        if ($user['email'] === $email && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'nom' => $user['nom'],
                'prenom' => $user['prenom'],
                'email' => $user['email'],
                'role' => $user['role']
            ];
            if ($user['role'] === 'admin') {
                header("Location: ../html/admin.html");
            } else {
                header("Location: ../html/profil.html");
            }
            exit;
        }
    }
    die("Identifiants invalides. <a href='../html/connexion.html'>Retour</a>");
} else {
    header("Location: ../html/connexion.html");
    exit;
}
?>
