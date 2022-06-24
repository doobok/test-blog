<?php

namespace App\Models;

use App\Database\MySQLConnection;

class Author
{
    public function displayAll(): array
    {
        $pdo = (new MySQLConnection())->connect();
        $statement = $pdo->prepare("SELECT * FROM authors");
        $statement->execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return ['authors' => $results];
    }

}