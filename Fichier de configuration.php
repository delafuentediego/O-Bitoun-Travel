<?php
// Configuration de base
session_start();
define('ROOT_PATH', dirname(__DIR__));
define('DATA_PATH', ROOT_PATH . '/data');

// Chargement des données
function loadData($file) {
    $path = DATA_PATH . '/' . $file . '.json';
    if (file_exists($path)) {
        return json_decode(file_get_contents($path), true);
    }
    return [];
}

function saveData($file, $data) {
    file_put_contents(DATA_PATH . '/' . $file . '.json', json_encode($data, JSON_PRETTY_PRINT));
}

// Initialisation des données si nécessaire
if (!file_exists(DATA_PATH . '/users.json')) {
    $initialUsers = [
        [
            'id' => 1,
            'username' => 'admin',
            'email' => 'admin@bitountravel.com',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'role' => 'admin',
            'created_at' => date('Y-m-d H:i:s')
        ],
        // Ajoutez d'autres utilisateurs de test
    ];
    saveData('users', $initialUsers);
}

if (!file_exists(DATA_PATH . '/trips.json')) {
    $initialTrips = [
        [
            'id' => 1,
            'title' => 'Découverte de Paris',
            'description' => 'Un voyage inoubliable dans la ville lumière',
            'start_date' => '2025-06-01',
            'end_date' => '2025-06-07',
            'price' => 1200,
            'steps' => [
                // Étapes du voyage
            ]
        ],
        // Ajoutez d'autres voyages de test
    ];
    saveData('trips', $initialTrips);
}
?>
