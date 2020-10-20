<?php

namespace App\Models;


use Illuminate\Support\Facades\DB;

class Categories
{
    private static $instance = null;

    public static function get(): Categories
    {
        if (is_null(static::$instance)) {
            static::$instance = new Categories();
        }
        return static::$instance;
    }

    /**
     * все категории в формате [ $categoryId ][ { 'title', 'slug' } ]
     */
    public  function getAllCategories() {
        return DB::table('categories')->get();
    }

    /**
     * данные о категории в виде [ { 'title', 'slug' } ]
     * @param int $id
     * @return mixed
     */
    public  function getCategoryById(int $id) {
        return DB::table('categories')->where('id', '=', $id)->limit(1)->first();
    }

    /**
     * Ищем Id категории по её slug описанию
     * @param string $slug
     * @return mixed
     */
    public  function getCategoryBySlug(string $slug) {
        return DB::table('categories')
            ->where('slug', '=', $slug)
            ->get()
            ->first();
    }
}
