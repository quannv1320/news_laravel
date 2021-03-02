<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\ArticleView;


class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $articles = Article::all();
        $views = ArticleView::all();

        $countCate = $categories->count();
        $countArt = $articles->count();

        return view('admin.admin', compact('countArt', 'countCate'));
    }
}
