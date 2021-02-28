<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class HomeController extends Controller
{
    public function homepage()
    {   
        $articles = Article::all();
        $categories = Category::all();
        return view('clients.homepage', compact('articles', 'categories'));
    }
}
