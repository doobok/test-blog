<?php

namespace App\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function category($id, $offset)
    {
        $news = new News();
        $data = $news->categoryBlog($id, $offset);

        $this->apiResponse($data);
    }

    public function author($id, $offset)
    {
        $news = new News();
        $data = $news->authorBlog($id, $offset);

        $this->apiResponse($data);
    }

    public function article($id)
    {
        $article = new News();
        $data = $article->articleBlog($id);

        $this->apiResponse($data);
    }


}