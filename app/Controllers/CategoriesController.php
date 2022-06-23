<?php

namespace App\Controllers;

use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories =  new Category();
        $data = $categories->getCategoriesTree();

        $this->apiResponse($data);
    }

}