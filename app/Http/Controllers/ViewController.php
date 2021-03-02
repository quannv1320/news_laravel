<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\ArticleView;

class ViewController extends Controller
{
    public function index()
    {   
        $articles = Article::all();
        $categories = Category::all();
        $views = ArticleView::all();
        return view('admin.viewcon.index', compact('articles', 'categories', 'views'));
    }
}
