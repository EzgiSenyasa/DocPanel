<?php

include 'function.php';

use Core\Database;

$database = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $database->insert(
        $pdo,
        'users',
        [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'specialization' => $_POST['specialization']
        ]
    );

    echo "Kayıt Başarılı";
}