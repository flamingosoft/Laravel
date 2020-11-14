<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(20, 5),
        'message' => $faker->realText(300, 5),
        'private' => $faker->boolean,
        'categoryId' => random_int(Category::query()->min('id'), Category::query()->max('id')),// $faker->randomNumber(1),
        'image' => null
    ];
});
