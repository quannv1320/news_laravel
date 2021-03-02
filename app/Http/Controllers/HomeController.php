<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\ArticleView;

class HomeController extends Controller
{
    public function homepage()
    {   
        $articles = Article::all();
        $categories = Category::all();
        $topArticles = Article::with('artView')->get()->sortByDesc('artView.views');
        return view('clients.homepage', compact('articles', 'categories','topArticles'));
    }

    public function hotNew()
    {
        $categories = Category::all();
        $topArticle = Article::with('artView')->get()->sortByDesc('ArticleView.views');
    }

    public function articleDetail($id)
    {
        $categories = Category::all();
        $articles = Article::all();
        $article = Article::find($id);
        $articleCate = Article::where('cate_id', $id)->get();
        return view('clients.articleDetail', compact('article','articles', 'categories','articleCate'));
    }

    public function pageCategory($id)
    {   
        $categories = Category::all();
        $articles = Article::all();
        $cateName = Category::find($id);
        $articleCate = Article::where('cate_id', $id)->get();
        $topArticle = Article::with('artView')->get()->sortByDesc('ArticleView.views');
        return view('clients.pageCate', compact('categories','cateName','articles','articleCate','topArticle'));
    }
}
