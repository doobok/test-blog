<?php

namespace App;

use App\Controllers\ViewsController;

class App
{
    public static function run()
    {
        Router::route('/api/tables', function () {
            (new Controllers\TablesController)->check();
        });
        Router::route('/api/tables_create', function () {
            (new Controllers\TablesController)->create();
        });
        Router::route('/api/authors', function () {
            (new Controllers\AuthorsController)->index();
        });
        Router::route('/api/categories', function () {
            (new Controllers\CategoriesController)->index();
        });
        Router::route('/api/author/(\d+)', function ($id) {
            (new Controllers\NewsController())->author($id);
        });
        Router::route('/api/news/(\d+)', function ($id) {
            (new Controllers\NewsController())->category($id);
        });
        Router::route('/api/article/(\d+)', function ($id) {
            (new Controllers\NewsController())->article($id);
        });


        Router::route('/', function () {
            ViewsController::view('index');
        });
        Router::route('/(\w+)', function ($page) {
            ViewsController::view($page);
        });
        Router::route('/category/(\d+)', function ($id) {
            ViewsController::view('category', $id);
        });
        Router::route('/author/(\d+)', function ($id) {
            ViewsController::view('author', $id);
        });
        Router::route('/news/(\d+)', function ($id) {
            ViewsController::view('news', $id);
        });
        Router::route('/article/(\d+)', function ($id) {
            ViewsController::view('article', $id);
        });

        Router::execute($_SERVER['REQUEST_URI']);
    }
}