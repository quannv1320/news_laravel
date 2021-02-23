<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;


class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $articles = Article::all();

        $countCate = $categories->count();
        $countArt = $articles->count();

        return view('admin.admin', compact('countArt', 'countCate'));
    }
}
