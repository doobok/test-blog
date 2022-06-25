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

    const AUTHORS_COUNT = 50;
    const CATEGORIES_COUNT = 60;
    const NEWS_COUNT = 1000;
    const CONNECTIONS_COUNT = 300;

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
            'CREATE TABLE IF NOT EXISTS categories (
            id INTEGER PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR (255) NOT NULL,
            parent_id INTEGER DEFAULT 0
        )',
            'CREATE TABLE IF NOT EXISTS news (
            id INTEGER PRIMARY KEY AUTO_INCREMENT,
            title VARCHAR (255) NOT NULL,
            intro TINYTEXT NOT NULL,
            text TEXT NOT NULL,
            author_id INTEGER NOT NULL
        )',
            'CREATE TABLE IF NOT EXISTS categories_news (
            category_id INTEGER NOT NULL,
            news_id INTEGER NOT NULL,
            PRIMARY KEY (category_id, news_id),
            INDEX category_id (category_id),
            INDEX news_id (news_id),
            CONSTRAINT fk_categories FOREIGN KEY (category_id) 
                REFERENCES categories (id) ON DELETE CASCADE,
            CONSTRAINT fk_news FOREIGN KEY (news_id) 
                REFERENCES news (id) ON DELETE CASCADE)'];
        // execute the sql commands to create new tables
        foreach ($commands as $command) {
            $this->pdo->exec($command);
        }
        return true;
    }

    public function seedDB(): bool
    {
        if ($this->checkTables()) {
            return false;
        }
        $this->createTables();

        $commands = [
            'INSERT INTO authors (name, photo, about) VALUES ' . $this->authorsSeed(),
            'INSERT INTO categories (name, parent_id) VALUES ' . $this->categoriesSeed(),
            'INSERT INTO news (title, intro, text, author_id) VALUES ' . $this->newsSeed(),
            'INSERT INTO categories_news (category_id, news_id) VALUES ' . $this->categoriesNewsSeed()
        ];
        foreach ($commands as $command) {
            try {
                $this->pdo->exec($command);
            } catch (Exception $e) {
                echo print_r($e);
                return false;
            }
        }
        return true;
    }

    /**
     * news Seed
     */
    private function newsSeed(): string
    {
        $data = '';
        for ($i = 1; $i <= self::NEWS_COUNT; $i++) {
            $author_id = $i > self::AUTHORS_COUNT ? $this->faker->numberBetween(1, self::AUTHORS_COUNT) : $i;
            $div = ($i < self::NEWS_COUNT) ? ',' : '';
            $data = $data . ' ("' .
                $this->faker->text(20) . '", "' .
                $this->faker->paragraph(2) . '", "' .
                $this->faker->paragraphs(5, true) . '", "' .
                $author_id . '")' .
                $div;
        }
        return $data;
    }

    /**
     * authors Seed
     */
    private function authorsSeed(): string
    {
        $data = '';
        for ($i = 1; $i <= self::AUTHORS_COUNT; $i++) {
            $div = ($i < self::AUTHORS_COUNT) ? ',' : '';
            $data = $data . ' ("' .
                $this->faker->name() . '", "' .
                $this->faker->imageUrl(250, 250, $this->faker->randomLetter(), true) . '", "' .
                $this->faker->paragraph(2) . '")' .
                $div;
        }
        return $data;
    }

    /**
     * categories Seed
     */
    private function categoriesSeed(): string
    {
        $data = '';
        for ($i = 1; $i <= self::CATEGORIES_COUNT; $i++) {
            $root_count = self::CATEGORIES_COUNT / 20;
            $parent_id = $i > $root_count ? $this->faker->numberBetween(0, $root_count) : 0;
            $div = ($i < self::CATEGORIES_COUNT) ? ',' : '';
            $data = $data . ' ("' .
                $this->faker->word() . '", "' .
                $parent_id . '")' .
                $div;
        }
        return $data;
    }

    /**
     * relations categories_news Seed
     */
    private function categoriesNewsSeed(): string
    {
        $data = '';
        for ($i = 1; $i <= self::CONNECTIONS_COUNT; $i++) {
            $category_id = $i > self::CATEGORIES_COUNT ? $this->faker->numberBetween(1, self::CATEGORIES_COUNT) : $i;
            $news_id = $i > self::NEWS_COUNT ? $this->faker->numberBetween(1, self::NEWS_COUNT) : $i;
            $div = ($i < self::CONNECTIONS_COUNT) ? ',' : '';
            $data = $data . ' ("' .
                $category_id . '", "' .
                $news_id . '")' .
                $div;
        }
        return $data;
    }

    /**
     * check tables in the database
     */
    public function checkTables(): bool
    {
        $count = count($this->pdo->query("SHOW TABLES")->fetchAll());
        return !($count < 4);
    }
}