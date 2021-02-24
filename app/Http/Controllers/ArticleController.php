<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(10);
        return view('admin.article.index', compact('articles'));
    }

    public function remove($id)
    {
        Article::destroy($id);
        return redirect(route('art.index'))->with('success', 'Xoá thành công');
    }

    public function add()
    {   
        $categories = Category::all();
        return view('admin.article.add', compact('categories'));
    }
    public function saveAdd(ArticleRequest $request)
    {
        $newArt = new Article();
        $newArt->title = $request->title;
        $newArt->cate_id = $request->cate_id;
        $newArt->author = $request->author;
        $newArt->short_desc = $request->short_desc;
        $newArt->content = $request->content;
        if($request->hasFile('image')) {
            $fileName = uniqid().'_'.$request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');
            $newArt->image = "storage/" . $filePath;
        }
        $newArt->save();

        return redirect(route('art.index'));
    }

    public function edit($id)
    {   
        // dd("ok");
        $oldArt = Article::find($id);
        $categories = Category::all();
        return view('admin.article.edit', compact('oldArt', 'categories'));
    }
    public function saveEdit($id, ArticleRequest $request)
    {
        $newArt = Article::find($id);
        $newArt->title = $request->title;
        $newArt->cate_id = $request->cate_id;
        $newArt->author = $request->author;
        $newArt->short_desc = $request->short_desc;
        $newArt->content = $request->content;
        if($request->hasFile('image')) {
            $fileName = uniqid().'_'.$request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');
            $newArt->image = "storage/" . $filePath;
        }
        $newArt->save();

        return redirect(route('art.index'));
    }
}
