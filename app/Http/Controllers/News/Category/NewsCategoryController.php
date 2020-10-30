<?php

namespace App\Http\Controllers\News\Category;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NewsCategoryController extends Controller
{
    public static function index() {
        return view('news.category.all')->with('categories', Category::getAllCategories());
    }

    public static function getAllNewsByCategorySlug($categorySlug)
    {
        $category = Category::getCategoryBySlug($categorySlug);
        return view('news.category.bySlug',
            [
                'news' => $category->News(), //News::getNewsByCategory($category->id),
                'category' => $category //Category::getCategoryById($category->id)
            ]);
    }
}
