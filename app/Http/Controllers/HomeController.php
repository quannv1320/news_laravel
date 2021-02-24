<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    public function homepage()
    {   
        $name = '<h1>Quân ĐẸP TRAI</h1>';
        $articles = Article::all();
        return view('clients.homepage', compact('articles', 'name'));
    }
}
