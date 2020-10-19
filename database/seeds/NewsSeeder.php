<?php

namespace App\NewsSeeder;

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
        DB::table('news')->insert($this->getData());
    }

    public function getData(): array
    {
        $data = [];

        $faker = Factory::create("ru_RU");
        for ($row = 0; $row < 10; ++$row) {
            $data[] = [
                'title' => $faker->sentence(3,6),
                'message' => $faker->text(1000),
                'private' => $faker->boolean,
                'categoryId' => $faker->randomNumber(1)
            ];
        }
        return $data;
    }
}
