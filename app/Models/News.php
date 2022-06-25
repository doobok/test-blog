<?php

namespace App\Models;

use App\Database\MySQLConnection;

class News
{
    public function categoryBlog($id, $offset): array
    {
        $pdo = (new MySQLConnection())->connect();
        $statement = $pdo->prepare("SELECT id, title, intro FROM  categories_news LEFT JOIN news 
                                            ON news_id = id 
                                            WHERE categories_news.category_id = " . $id . " LIMIT " . $offset .", 20");
        $statement->execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return ['news' => $results];
    }

    public function authorBlog($id, $offset): array
    {
        $pdo = (new MySQLConnection())->connect();
        $statement = $pdo->prepare("SELECT id, title, intro 
                                            FROM news WHERE author_id = " . $id . " LIMIT " . $offset .", 20");
        $statement->execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return ['news' => $results];
    }

    public function articleBlog($id): array
    {
        $pdo = (new MySQLConnection())->connect();
        $statement = $pdo->prepare("SELECT * FROM news WHERE id=" . $id);
        $statement->execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return ['article' => $results];
    }

}