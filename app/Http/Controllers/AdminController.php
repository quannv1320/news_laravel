<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\ArticleView;
use Redirect,Response;
use charts;


class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $articles = Article::all();        

        $countCate = $categories->count();
        $countArt = $articles->count();

        $countView = ArticleView::all();

//      Biểu đồ
        $record = Article::select(\DB::raw("COUNT(*) as count"))->get();
    
        $data = [];
    
        foreach($record as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
        }
    
        $data['chart_data'] = json_encode($data);


        return view('admin.admin', compact('countArt', 'countCate','countView'));

    }
   
}
