<?php

spl_autoload_register(function ($class) {
   if (class_exists($class, false) || in_array($class, get_declared_classes())) {
      return;
   }

   $baseDir = __DIR__ . '/';
   $file = $baseDir . str_replace('\\', '/', $class) . '.php';

   if (file_exists($file)) {
      require_once $file;
   } else {
      die("Autoload hatası: $file bulunamadı.");
   }
});

use Core\Database;
use Core\Auth;

$database = new Database();
$auth = new Auth();