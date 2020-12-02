<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('news.category.all')
            ->with('title', 'Список категорий')
            ->with('mode', 'all')
            ->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.category')
            ->with('title', 'Создание новой категории')
            ->with('mode', 'create')
            ->with('category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->fill($request->all());

        $this->validate($request, Category::rules($category), Category::messages(), Category::attributes());

        $category->save();
        return redirect()->route('news.category.show', $category);
    }

    /**
     * Показывает категорию отдельной страницей со всеми полями
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Category $category)
    {
        return view('admin.category')
            ->with('title', 'Информация по категории')
            ->with('mode', 'show')
            ->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('admin.category')
            ->with('mode', 'edit')
            ->with('title', 'Редактирование категории')
            ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $category->fill($request->all());
        $this->validate($request, Category::rules($category), Category::messages(), Category::attributes());
        $category->save();
        return redirect()->route('news.category.show', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('news.category.home')
            ->with('deleteMsg', 'Успешно удалена категория');
    }
}
