<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleView extends Model
{
    use HasFactory;
    protected $table = "article_views";

    public function article()
    {
        return $this->hasOne(Article::class, 'art_id');
    }
}
