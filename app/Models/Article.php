<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles';

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id');
    }

    public function artView()
    {
        return $this->hasOne(ArticleView::class, 'art_id');
    }
}
