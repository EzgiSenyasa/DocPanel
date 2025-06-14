<?php
include 'function.php';

use Core\Database;

$database = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $password = $_POST['password'] ?? '';

    $user = $database->select(
        "SELECT * FROM users WHERE name = :name AND password = :password",
        [
            'name' => $name,
            'password' => $password
        ],
        false
    );

    if ($user) {
        echo "Giriş Başarılı";
    } else {
        echo "Eksik ya da yanlış bilgi";
    }
}
