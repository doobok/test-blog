<?php

namespace App\Models;

use App\Database\MySQLConnection;

class Category
{
    public $categories = [];

    public function __construct()
    {
        $this->categories = $this->getCategories();
    }

    public function getCategories(): array
    {
        $arr_cat = [];
        $pdo = (new MySQLConnection())->connect();
        $statement = $pdo->query("SELECT id, name, parent_id FROM categories")->fetchAll();
        foreach ($statement as $category) {
            $arr_cat[$category['id']] = [
                'id' => $category['id'],
                'name' => $category['name'],
                'parent_id' => $category['parent_id'],
            ];
        }
        return $arr_cat;
    }

    public function getCategoriesTree(): array
    {
        $tree = [];
        $categories = $this->categories;
        foreach ($categories as $id => &$node) {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $categories[$node['parent_id']]['children'][$id] = &$node;
            }
        }
        return ['categories' => $tree];
    }

}