<?php

namespace App\Controllers;

use App\Models\Author;

class AuthorsController extends Controller
{
    public function index()
    {
        $authors =  new Author();
        $data = $authors->displayAll();

        $this->apiResponse($data);
    }

}