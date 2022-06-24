<?php

namespace App\Database;

/**
 * MySQL connection
 */
class MySQLConnection
{
    /**
     * PDO instance
     * @var type
     */
    private $pdo;

    /**
     * return in instance of the PDO
     * @return \PDO
     */
    public function connect()
    {
        if ($this->pdo == null) {
            $this->pdo = new \PDO("mysql:dbname=" . $_ENV['DB_NAME'] . ";host=" . $_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
        }
        return $this->pdo;
    }
}
