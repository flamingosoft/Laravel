<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Список всех новостей и категорий
     * @return Factory|View('news.all')
     */
    public function index()
    {
        $categories = Category::all();
        $news = News::paginate(5);

        return view('news.all')
            ->with('news', $news)
            ->with('categories', $categories);
    }

    public function search(Request $request)
    {
        $searchQuery = $request->get('q');
        $news = News::query()
            ->where('title', 'like', '%' . $searchQuery . '%')
            ->orWhere('message', 'like', '%' . $searchQuery . '%')
            ->paginate(3);

        return view('news.all')
            ->with('news', $news)
            ->with('search', mb_strtolower($searchQuery));
    }

    /**
     * конкретная новость по айдишнику
     * @param $newsId
     * @return Factory|View('news.id')
     */
    public function newsOne(News $news)
    {
        return view('news.id')
            ->with("new", $news);
    }
}
