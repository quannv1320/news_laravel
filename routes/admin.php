<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController; ///////////////////
use App\Http\Controllers\CategoryController; ///////////////////
use App\Http\Controllers\ArticleController; ///////////////////
use App\Http\Controllers\ViewController; ///////////////////
use App\Http\Controllers\UserController; ///////////////////
use App\Http\Controllers\AdminController; ///////////////////



//Login logout
Route::get('', function () {
    return redirect(route('login'));
});
Route::view('login', 'auth.login')->name('login');
Route::post('login', [LoginController::class, 'postLogin']);

Route::any('logout', function()
{
    Auth::logout();
    return redirect(route('homepage'));
})->name('logout');

Route::get('admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');

//Quản lý danh mục
Route::prefix('category')
    ->middleware('auth')
    ->group(function(){
        Route::get('/', [CategoryController::class, 'index'])->name('cate.index');
        Route::get('/{id}/remove', [CategoryController::class, 'remove'])->name('cate.remove');
        Route::get('/add', [CategoryController::class, 'add'])->name('cate.add');
        Route::post('/add', [CategoryController::class, 'saveAdd']);
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('cate.edit');
        Route::post('/edit/{id}', [CategoryController::class, 'saveEdit']);
        Route::get('/detail/{id}', [CategoryController::class, 'detailCate'])->name('cate.detail');
});

Route::prefix('article')
    ->middleware('auth')
    ->group(function(){
        Route::get('/', [ArticleController::class, 'index'])->name('art.index');
        Route::get('/{id}/remove', [ArticleController::class, 'remove'])->name('art.remove');
        Route::get('/add', [ArticleController::class, 'add'])->name('art.add');
        Route::post('/add', [ArticleController::class, 'saveAdd']);
        Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('art.edit');
        Route::post('/edit/{id}', [ArticleController::class, 'saveEdit']);
});

Route::prefix('view')
    ->middleware('auth')
    ->group(function(){
        Route::get('/', [ViewController::class, 'index'])->name('view.index');
});

Route::prefix('user')
    ->middleware('auth')
    ->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        // Route::get('/{id}/remove', [ArticleController::class, 'remove'])->name('cate.remove');
});