<?php
include 'function.php';

use Core\Database;

$database = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $password = $_POST['password'] ?? '';

    $user = $database->select(
        "SELECT * FROM users WHERE name = :name",
        ['name' => $name],
        false
    );

    if ($user && $password === $user['password']) {
        echo "Giriş Başarılı";
    } else {
        echo "Eksik ya da yanlış bilgi";
    }
}