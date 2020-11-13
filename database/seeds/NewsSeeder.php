<?php

namespace App\Seeders;

use App\Models\Category;
use App\Models\News;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(News::class, 10)->create();
//        DB::table('news')->insert($this->getData());
    }

//    public function getData(): array
//    {
//        $data = [];
//
//        $faker = Factory::create("ru_RU");
//        for ($row = 0; $row < 10; ++$row)
//        {
//            $data[] = [
//                'title' => $faker->realText(10,5),
//                'message' => $faker->realText(30, 5),
//                'private' => $faker->boolean,
//                'categoryId' => random_int(Category::query()->min('id'), Category::query()->max('id')),// $faker->randomNumber(1),
//                'image' => null
//            ];
//        }
//        return $data;
//    }
}
