<?php
session_start();

// Chemins vers les fichiers de données
define('USERS_FILE', __DIR__ . '/../../data/users.json');
define('VOYAGES_FILE', __DIR__ . '/../../data/voyages.json');
define('TRANSACTIONS_FILE', __DIR__ . '/../../data/transactions.json');

function read_users() {
    if (!file_exists(USERS_FILE)) {
        file_put_contents(USERS_FILE, json_encode([]));
    }
    $json = file_get_contents(USERS_FILE);
    return json_decode($json, true);
}

function write_users($users) {
    file_put_contents(USERS_FILE, json_encode($users, JSON_PRETTY_PRINT));
}

function read_voyages() {
    if (!file_exists(VOYAGES_FILE)) {
        file_put_contents(VOYAGES_FILE, json_encode([]));
    }
    $json = file_get_contents(VOYAGES_FILE);
    return json_decode($json, true);
}

function write_voyages($voyages) {
    file_put_contents(VOYAGES_FILE, json_encode($voyages, JSON_PRETTY_PRINT));
}

function read_transactions() {
    if (!file_exists(TRANSACTIONS_FILE)) {
        file_put_contents(TRANSACTIONS_FILE, json_encode([]));
    }
    $json = file_get_contents(TRANSACTIONS_FILE);
    return json_decode($json, true);
}

function write_transactions($transactions) {
    file_put_contents(TRANSACTIONS_FILE, json_encode($transactions, JSON_PRETTY_PRINT));
}
?>
