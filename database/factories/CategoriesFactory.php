<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

/**
 * неявно вызывается из CategoriesSeeder::run
 */
$factory->define(Category::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(20,3),
        'slug' => $faker->word(),
    ];
});
