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
        $category = Categories::get()->getCategoryBySlug($categorySlug);
        return view('news.category.bySlug',
            [
                'news' => News::get()->getNewsByCategory($category->id),
                'category' => Categories::get()->getCategoryById($category->id)
            ]);
    }
}
