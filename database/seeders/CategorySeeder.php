<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; //thêm model

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cate_list = [
            [
                'name' => 'Xã hội',
                'description' => 'Báo xã hội'
            ],
            [
                'name' => 'Thế giới',
                'description' => 'Báo thế giới'
            ],
            [
                'name' => 'Thể thao',
                'description' => 'Báo thể thao'
            ],
            [
                'name' => 'Giáo dục',
                'description' => 'Báo giáo dục'
            ],
            [
                'name' => 'Giải trí',
                'description' => 'Báo giải trí'
            ],
            [
                'name' => 'Xe++',
                'description' => 'Báo xe hơi, xe máy'
            ],
        ];

        foreach ($cate_list as $item) {
            Category::create($item);
            // $model = new Category();
            // $model->fill($item);
            // $model->save();
        }
    }
}
