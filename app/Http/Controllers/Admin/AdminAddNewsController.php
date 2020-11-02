<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAddNewsController extends Controller
{
    public function __invoke(Request $request)
    {
        // TODO: save data to file and redirect to this news

        if ($request->isMethod('post')) {
            return $this->addNew($request);
        }
        else
            return view('admin.addNews')
                ->with('categories', Category::getAllCategories());
    }

    private function addNew(Request $request)
    {
        $imageUrl = self::storeImage($request->file('image'));

        $news = News::addNews(
            $request,
            $imageUrl
        );

        // получаем данные из формы
        $request->flash();

        return redirect()
            ->route('news.byId', $news)
            ->with('success', true);
    }

    public function storeImage($image) {
        /* you must exec: php artisan storage:link!!! */
        if ($image) {
            $path = Storage::putFile('public/images', $image);
            return asset(Storage::url($path));
        }
        return null;
    }
}
