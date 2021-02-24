<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Article;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.cate.index', compact('categories'));
    }

    public function remove($id)
    {
        Category::destroy($id);
        return redirect(route('cate.index'))->with('success', 'Xoá thành công');
    }

    //Thêm mới
    public function add()
    {
        return view('admin.cate.add');
    }
    public function saveAdd(CategoryRequest $request)
    {
        $newCate = new Category();
        $newCate->name = $request->name;
        $newCate->description = $request->description;
        $newCate->save();

        return redirect(route('cate.index'))->with('success', 'Tạo mới thành công');
    }

    //Sửa
    public function edit($id)
    {
        $oldCate = Category::find($id);
        return view('admin.cate.edit', compact('oldCate'));
    }
    public function saveEdit($id, CategoryRequest $request)
    {
        $newCate = Category::find($id);
        $newCate->name = $request->name;
        $newCate->description = $request->description;
        $newCate->save();

        return redirect(route('cate.index'))->with('success', 'Cập nhật thành công');
    }

    //Chi tiết
    public function detailCate($id)
    {
        $cateName = Category::find($id);
        $articles = Article::where('cate_id', $id)->get();
        return view('admin.cate.detail', compact('cateName', 'articles'));
    }
}
