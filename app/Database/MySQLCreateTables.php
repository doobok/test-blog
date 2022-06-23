<?php

namespace App\Database;

use App\Config;

/**
 * MySQL Create Tables
 */
class MySQLCreateTables
{

    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;

    /**
     * connect to the MySQL database
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * create tables
     */
    public function createTables()
    {
        $commands = [
            'CREATE TABLE IF NOT EXISTS authors (
            id INTEGER PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR (255) NOT NULL,
            photo VARCHAR (255) NOT NULL,
            about TINYTEXT
        )',
            'CREATE TABLE IF NOT EXISTS news (
            id INTEGER PRIMARY KEY AUTO_INCREMENT,
            title VARCHAR (255) NOT NULL,
            intro TINYTEXT NOT NULL,
            text TEXT NOT NULL,
            author_id INTEGER NOT NULL
        )',
            'CREATE TABLE IF NOT EXISTS categories (
            id INTEGER PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR (255) NOT NULL,
            parent_id INTEGER DEFAULT 0
        )',
            'CREATE TABLE IF NOT EXISTS categories_news (
            category_id INTEGER NOT NULL REFERENCES categories(id),
            news_id INTEGER NOT NULL REFERENCES news(id))'];
        // execute the sql commands to create new tables
        foreach ($commands as $command) {
            $this->pdo->exec($command);
        }
        return true;
    }

    /**
     * check tables in the database
     */
    public function checkTables()
    {
        $count = count($this->pdo->query("SHOW TABLES")->fetchAll());
        return !($count < 4);
    }
}