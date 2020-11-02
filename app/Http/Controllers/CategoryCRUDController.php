<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->flash();
        return view('news.category.item')
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
        return view('news.category.item')
            ->with('title', 'Создание новой категории')
            ->with('mode', 'create')
            ->with('category', new Category());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->fill($request->all());
        $category->save();
        return redirect()->route('news.category.show', $category);
    }

    /**
     * Показывает категорию отдельной страницей со всеми полями
     *
     * @param Category $category
     */
    public function show(Category $category)
    {
        return view('news.category.item')
            ->with('title', 'Информация по категории')
            ->with('mode', 'show')
            ->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     */
    public function edit(Category $category)
    {
        return view('news.category.item')
            ->with('mode', 'edit')
            ->with('title', 'Редактирование категории')
            ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     */
    public function update(Request $request, Category $category)
    {
        $category->fill($request->all());
        $category->save();
        return redirect()->route('news.category.show', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('news.category.home')
            ->with('deleteMsg', 'Успешно удалена категория');
    }
}
