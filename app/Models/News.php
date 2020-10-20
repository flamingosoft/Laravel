<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;


class News
{
    private static $instance = null;

    public static function get(): News
    {
        if (is_null(static::$instance)) {
            static::$instance = new News();
        }
        return static::$instance;
    }

    public function addNews($title, $category, $message, $private, $imageUrl = null): int
    {
        return DB::table('news')
            ->insertGetId([
                'title' => $title,
                'message' => $message,
                'private' => $private == 'private',
                'categoryId' => Categories::get()->getCategoryBySlug($category)->id,
                'image' => $imageUrl
            ]);
    }

    public function getAllNews()
    {
        return DB::table('news')->get();
    }

    public function getNewsById(int $id)
    {
        return DB::table('news')
            ->where('id', '=', $id)
            ->limit(1)
            ->first();
    }

    public function getNewsByCategory(int $categoryId)
    {
        return DB::table('news')
            ->where("categoryId", "=", $categoryId)
            ->get("*");
    }

    public function getFullView()
    {
        return DB::table('news')
            ->select('news.title', 'news.message')
            ->leftJoin('categories', 'news.categoryId','=', 'categories.id')
            ->select('categories.title as category', 'news.title as title', 'news.message as message')
            ->get();
    }


}
