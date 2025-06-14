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


    public function update($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        return $stmt->execute();
    }


    public function fetchAll($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        $stmt->execute();

        Logger::dbLog("[$this->clientIp] $this->requestMethod $this->requestUri - 200 OK - " . htmlspecialchars($sql) . " - " . json_encode($params));

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function fetch($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        $stmt->execute();

        Logger::dbLog("[$this->clientIp] $this->requestMethod $this->requestUri - 200 OK - " . htmlspecialchars($sql) . " - " . json_encode($params));

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
