<?php

namespace App\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // тут неявно вызывается CategoriesFactory
        factory(Category::class, 10)->create();
        //DB::table('categories')->insert($this->getData());
    }

//    public function getData(): array
//    {
//        $data = [];
//
//        $faker = Factory::create("ru_RU");
//        for ($row = 0; $row < 10; ++$row) {
//            $data[] = [
//                'title' => $faker->sentence(1,3),
//                'slug' => $faker->word(),
//            ];
//        }
//        return $data;
//    }
}
