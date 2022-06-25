<?php

namespace App;

use App\Controllers\ViewsController;

class App
{
    public static function run()
    {
        $request = new Request();

        Router::get('/api/tables', $request, function () {
            (new Controllers\TablesController)->check();
        });
        Router::post('/api/tables', $request, function () {
            (new Controllers\TablesController)->create();
        });
        Router::get('/api/authors', $request, function () {
            (new Controllers\AuthorsController)->index();
        });
        Router::get('/api/categories', $request, function () {
            (new Controllers\CategoriesController)->index();
        });
        Router::get('/api/author/(\d+)', $request, function ($id) use ($request) {
            (new Controllers\NewsController())->author($id, $request->offset);
        });
        Router::get('/api/news/(\d+)', $request, function ($id) use ($request) {
            (new Controllers\NewsController())->category($id, $request->offset);
        });
        Router::get('/api/article/(\d+)', $request, function ($id) {
            (new Controllers\NewsController())->article($id);
        });

        Router::get('/', $request, function () {
            ViewsController::view('index');
        });
        Router::get('/(\w+)', $request, function ($page) {
            ViewsController::view($page);
        });
        Router::get('/category/(\d+)', $request, function ($id) {
            ViewsController::view('category', $id);
        });
        Router::get('/author/(\d+)', $request, function ($id) {
            ViewsController::view('author', $id);
        });
        Router::get('/news/(\d+)', $request, function ($id) {
            ViewsController::view('news', $id);
        });
        Router::get('/article/(\d+)', $request, function ($id) {
            ViewsController::view('article', $id);
        });

        Router::execute($_SERVER['REQUEST_URI']);
    }
}