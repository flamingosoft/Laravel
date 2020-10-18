<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminAddNewsController extends Controller
{
    public function __invoke(Request $request, Response $response)
    {
        // TODO: save data to file and redirect to this news

        if ($request->method() == "POST") {

            // TODO: добавить загрузку файла и его складирование в нужную папку Storage'а
            $id = News::factory()->addNews(
                $request->title,
                $request->category,
                $request->message,
                $request->private
            );

            // получаем данные из формы
            $request->flash();

            return redirect(route('news.byId', $id));
//            return redirect(route('admin.addNews', ['wrongTitle', 'Wrong']));
//            return view('admin.addNews')
//                ->with('categories', Categories::getAllCategories())
//                ->with('wrongTitle', 'Wrong');
        }
        return view('admin.addNews')
            ->with('categories', Categories::factory()->getAllCategories());
    }
}
