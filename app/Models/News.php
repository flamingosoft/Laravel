<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Category;

class News extends Model
{
    protected $fillable = ['title', 'message', 'private', 'image'];

    public static function addNews(Request $request, $imageUrl = null): News
    {
        $news = new News();
        $news->fill($request->except(['_token']));
        $news->save();
        return $news;
//
//        return static::insertGetId()[
//                'title' => $title,
//                'message' => $message,
//                'private' => $private == 'private',
//                'categoryId' => Category::getCategoryBySlug($category)->id,
//                'image' => $imageUrl
//            ]);
    }

    public static function getAllNews()
    {
        return static::query();
    }

    public static function getNewsById(int $id)
    {
        return News::query()->find($id);
//        return static::where('id', '=', $id)
//            ->limit(1)
//            ->first();
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
            ->orWhere('message', 'like', '%' . $search . '%');
    }

    public function Category() {
        return $this::belongsTo(Category::class,  'categoryId')->first();
    }

}
