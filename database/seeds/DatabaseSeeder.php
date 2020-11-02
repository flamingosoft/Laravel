<?php

use App\Seeders\CategoriesSeeder;
use App\Seeders\NewsSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeeder::class);
        $this->call(NewsSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
