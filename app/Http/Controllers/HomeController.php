<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    public function homepage()
    {   
        $articles = Article::all();
        return view('clients.homepage', compact('articles'));
    }
}
