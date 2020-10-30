<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class News extends Model
{
    public static function addNews($title, $category, $message, $private, $imageUrl = null): int
    {
        return static::insertGetId([
                'title' => $title,
                'message' => $message,
                'private' => $private == 'private',
                'categoryId' => Category::getCategoryBySlug($category)->id,
                'image' => $imageUrl
            ]);
    }

    public static function getAllNews()
    {
        return static::all();
    }

    public static function getNewsById(int $id)
    {
        return static::where('id', '=', $id)
            ->limit(1)
            ->first();
    }

    public static function getNewsByCategory(int $categoryId)
    {
        return static::where("categoryId", "=", $categoryId)
            ->get("*");
    }

//    public static function getFullView()
//    {
//        return static::select('news.title', 'news.message')
//            ->leftJoin('categories', 'news.categoryId','=', 'categories.id')
//            ->select('categories.title as category', 'news.title as title', 'news.message as message')
//            ->get();
//    }

    public static function getLikeAs($search)
    {
//        return News::query()->paginate(1);
        return static::query()->where('title', 'like', '%'. $search .'%')
            ->orWhere('message', 'like', '%' . $search . '%')
            ->paginate(3);
    }

    public function Category() {
        return $this::belongsTo('App\Models\Category',  'categoryId');
    }

}
