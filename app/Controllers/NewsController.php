<?php

namespace App\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function category($id)
    {
        $news =  new News();
        $data = $news->categoryBlog($id);

        $this->apiResponse($data);
    }

    public function author($id)
    {
        $news =  new News();
        $data = $news->authorBlog($id);

        $this->apiResponse($data);
    }

    public function article($id)
    {
        $article =  new News();
        $data = $article->articleBlog($id);

        $this->apiResponse($data);
    }



}