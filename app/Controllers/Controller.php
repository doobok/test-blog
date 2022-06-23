<?php

namespace App\Controllers;

class Controller
{
    public static function apiResponse($data)
    {
        header('Content-type: application/json');
        echo json_encode($data);
    }

}