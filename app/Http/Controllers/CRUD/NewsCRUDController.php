<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $categories = Category::all();
        $news = News::query()->orderByDesc('updated_at')->paginate(5);

        return view('news.all')
            ->with('news', $news)
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.news')
            ->with('mode', 'create')
            ->with('categories', Category::all()
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $imageUrl = self::storeImage($request->file('image'));

        $news = new News();
        $news->fill($request->all());
        $news->image = $imageUrl;
        $news->private = isset($request->private);
        $news->categoryId = Category::query()->where('slug', $request->category)->first()->id;
        $news->save();

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
            return Storage::url($path);
        }
        return null;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(News $news)
    {
        return view('news.id')
            ->with("new", $news)
            ->with('mode', 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(News $news)
    {
        return view('admin.news')
            ->with("news", $news)
            ->with('mode', 'edit')
            ->with('categories', Category::all()
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
