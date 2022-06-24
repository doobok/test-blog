<?php

namespace App\Database;

use Exception;

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
     * PDO object
     * @var \Faker\Factory
     */
    private $faker;

    /**
     * connect to the MySQL database
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->faker = \Faker\Factory::create();
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

    public function seedDB()
    {
        $this->createTables();

        $commands = [
            'INSERT INTO news (title, intro, text, author_id) VALUES '.  $this->newsSeed(200),
            'INSERT INTO categories (name, parent_id) VALUES '.  $this->categoriesSeed(50),
            'INSERT INTO categories_news (category_id, news_id) VALUES '.  $this->categoriesNewsSeed(300),
            'INSERT INTO authors (name, photo, about) VALUES '.  $this->authorsSeed(50)
        ];
        foreach ($commands as $command) {
            try {
                $this->pdo->exec($command);
            }
            catch(Exception $e)
            {
                echo print_r($e);
                return false;
            }
        }
        return true;
    }
    /**
     * news Seed
     */
    private function newsSeed($count)
    {
        $data = '';
        for ($i=1; $i <= $count; $i++) {
            $div = ($i<$count) ? ',': '';
            $data = $data. ' ("'.
                $this->faker->text(20).'", "'.
                $this->faker->paragraph(2).'", "'.
                $this->faker->paragraphs(5, true).'", "'.
                $this->faker->numberBetween(1, 50).'")'.
                $div;
        }
        return $data;
    }
    /**
     * authors Seed
     */
    private function authorsSeed($count)
    {
        $data = '';
        for ($i=1; $i <= $count; $i++) {
            $div = ($i<$count) ? ',': '';
            $data = $data. ' ("'.
                $this->faker->name().'", "'.
                $this->faker->imageUrl(250, 250, 'author', true).'", "'.
                $this->faker->paragraph(2).'")'.
                $div;
        }
        return $data;
    }
    /**
     * categories Seed
     */
    private function categoriesSeed($count)
    {
        $data = '';
        for ($i=1; $i <= $count; $i++) {
            $div = ($i<$count) ? ',': '';
            $data = $data. ' ("'.
                $this->faker->word().'", "'.
                $this->faker->numberBetween(0, 15).'")'.
                $div;
        }
        return $data;
    }
    /**
     * relations categories_news Seed
     */
    private function categoriesNewsSeed($count)
    {
        $data = '';
        for ($i=1; $i <= $count; $i++) {
            $div = ($i<$count) ? ',': '';
            $data = $data. ' ("'.
                $this->faker->numberBetween(1, 50).'", "'.
                $this->faker->numberBetween(1, 200).'")'.
                $div;
        }
        return $data;
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