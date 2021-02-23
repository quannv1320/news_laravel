<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for ($i=0; $i < 20; $i++) { 
            $article = new Article;
            $article->title = "Bài viết ".$i;
            $article->cate_id = rand(1, 5);
            $article->short_desc = "Tóm tắt".$i;
            $article->image = "Ảnh ".$i;
            $article->content = "Nội dung bài viết ".$i;
            $article->author = "Tác giả ".$i;
            $article->save();
       }
    }
}
