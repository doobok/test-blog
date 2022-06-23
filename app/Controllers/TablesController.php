<?php

namespace App\Controllers;

use App\Database\MySQLConnection;
use App\Database\MySQLCreateTables;

class TablesController extends Controller
{
    public $db;
    public function __construct()
    {
        $this->db = new MySQLCreateTables((new MySQLConnection())->connect());
    }

    public function check()
    {
        $result = $this->db->checkTables();
        $this->apiResponse(['success' => $result]);
    }

    public function create()
    {
        $result = $this->db->createTables();
        $this->apiResponse(['success' => $result]);
    }
}