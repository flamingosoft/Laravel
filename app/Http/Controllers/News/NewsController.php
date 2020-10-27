<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Controllers\News\Category\NewsCategoryController;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Список всех новостей и категорий
     * @return Factory|View('news.all')
     */
    public function index()
    {
        $categories = Categories::get()->getAllCategories();
        $news = News::get()->getAllNews();
        return view('news.all')
            ->with('news', $news)
            ->with('categories', $categories);
    }

    public function search(Request $request) {
        $search = $request->get('q');
        $news = News::get()->getLikeAs($search);
        return view('news.all')
            ->with('news', $news)
            ->with('search', mb_strtolower($search));
    }

    /**
     * Список всех новостей по конкретной категории
     * @param $categorySlug
     * @return Factory|View
     */
    public function category($categorySlug)
    {
        return NewsCategoryController::getAllNewsByCategorySlug($categorySlug);
    }

    /**
     * конкретная новость по айдишнику
     * @param $newsId
     * @return Factory|View('news.id')
     */
    public function news($newsId)
    {
        return view('news.id')
            ->with("new", News::get()->getNewsById($newsId));
    }
}
