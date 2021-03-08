<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cmt_list = [
            [
                'username' => 'quan',
                'email' => 'quan@gmail.com',
                'message' => 'Bình luận 1',
                'art_id' => 1
            ],
            [
                'username' => 'nam',
                'email' => 'nam@gmail.com',
                'message' => 'Bình luận 2',
                'art_id' => 1
            ],
            [
                'username' => 'viet',
                'email' => 'vietam@gmail.com',
                'message' => 'Bình luận 3',
                'art_id' => 2
            ],
            [
                'username' => 'duc',
                'email' => 'ducm@gmail.com',
                'message' => 'Bình luận 4',
                'art_id' => 2
            ],
        ];

        foreach($cmt_list as $item){
            $model = new Comment();
            $model->fill($item);
            $model->save();
        }
    }
}
