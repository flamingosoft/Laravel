<?php

namespace App\Http\Controllers\News\Category;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NewsCategoryController extends Controller
{
    public static function index() {
        return view('news.category.all')->with('categories', Categories::get()->getAllCategories());
    }

    public static function getAllNewsByCategorySlug($categorySlug)
    {
        $categoryId = Categories::get()->getCategoryByTitle($categorySlug);
        return view('news.category.bySlug',
            [
                'news' => News::get()->getNewsByCategory($categoryId),
                'category' => Categories::get()->getCategoryById($categoryId)
            ]);
    }
}
