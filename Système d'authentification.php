<?php
require_once 'config.php';

function isLoggedIn() {
    return isset($_SESSION['user']);
}

function isAdmin() {
    return isLoggedIn() && $_SESSION['user']['role'] === 'admin';
}

function loginUser($email, $password) {
    $users = loadData('users');
    foreach ($users as $user) {
        if ($user['email'] === $email && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            return true;
        }
    }
    return false;
}

function logoutUser() {
    session_unset();
    session_destroy();
}

function registerUser($userData) {
    $users = loadData('users');
    
    // Vérification si l'email existe déjà
    foreach ($users as $user) {
        if ($user['email'] === $userData['email']) {
            return false;
        }
    }
    
    // Création du nouvel utilisateur
    $newUser = [
        'id' => count($users) + 1,
        'username' => $userData['username'],
        'email' => $userData['email'],
        'password' => password_hash($userData['password'], PASSWORD_DEFAULT),
        'role' => 'user',
        'created_at' => date('Y-m-d H:i:s')
    ];
    
    $users[] = $newUser;
    saveData('users', $users);
    
    // Connecter automatiquement l'utilisateur
    $_SESSION['user'] = $newUser;
    return true;
}
?>
