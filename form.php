<?php

require_once(__DIR__ . '/php/autoloader.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $database->insert(
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