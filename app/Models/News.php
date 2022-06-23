<?php

namespace App\Models;

use App\Database\MySQLConnection;

class News
{
    public function categoryBlog($id): array
    {
        $pdo = (new MySQLConnection())->connect();
        $statement = $pdo->prepare("SELECT * FROM news INNER JOIN categories_news on categories_news.category_id=". $id);
        $statement->execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return ['news' => $results ];
    }

    public function authorBlog($id): array
    {
        $pdo = (new MySQLConnection())->connect();
        $statement = $pdo->prepare("SELECT * FROM news WHERE author_id=". $id);
        $statement->execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return ['news' => $results ];
    }

    public function articleBlog($id): array
    {
        $pdo = (new MySQLConnection())->connect();
        $statement = $pdo->prepare("SELECT * FROM news WHERE author_id=". $id);
        $statement->execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return ['article' => $results ];
    }

}