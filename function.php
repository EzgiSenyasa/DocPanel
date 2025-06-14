<?php

namespace Core;

use \PDO;
use \PDOException;

class Database
{

    private $pdo;

    public function __construct()
    {
        $host = 'localhost';
        $dbname = 'docpanel';
        $username = 'root';
        $password = '';

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Bağlantı hatası:" . $e->getMessage();
        }
    }

    public function insert($table, $data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $query = $this->pdo->prepare($sql);

        foreach ($data as $key => $value) {
            $query->bindValue(":$key", $value);
        }

        return $query->execute();
    }
}