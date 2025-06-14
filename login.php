<?php

require_once(__DIR__ . '/php/autoloader.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo $auth->login($_POST);
}
