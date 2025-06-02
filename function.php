<?php
include 'conn.php';

class Fonksiyonlar
{
    public function insert($pdo, $table, $data)
    {

        $columns = array_keys($data);
        $placeholders = array_map(fn($col) => ":$col", $columns);

        echo $placeholders;

        $columnsStr = implode(',', $columns);
        $placeholdersStr = implode(',', $placeholders);

        $sql = "INSERT INTO $table ($columnsStr) VALUES ($placeholdersStr)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
    }
}

/*$data = [
    'name' => 'Ezgi',
    'email' => 'ezgi@example.com'
];

insert($pdo, 'users', $data);
*/