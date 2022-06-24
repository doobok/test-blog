<?php

namespace App\Controllers;

class ViewsController
{
    public static function view($page, $id=false)
    {
        $fullPath = __DIR__ . '/../Views/' . $page . '.php';
        if (!file_exists($fullPath))
        {
            $fullPath = __DIR__ . '/../Views/errors/404.php';
        }
        require_once $fullPath;
    }

}