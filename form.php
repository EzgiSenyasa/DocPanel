<?php

include 'function.php';

use Core\Database;

$database = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'specialization' => $_POST['specialization']
    ];


    $database->insert($pdo, 'users', $data);

    echo "Kayıt Başarılı";
}