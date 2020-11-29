<?php

namespace App\Models;

use App\Rules\SimpleTextRules;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;

class News extends Model
{
    protected $fillable = ['title', 'message', 'private', 'image', 'categoryId'];

    public function Category() {
        return $this::belongsTo(Category::class,  'categoryId')->first();
    }

    public static function rules($id = -1)
    {
        return [
            'title' => [
                'required',
                new SimpleTextRules(),
                Rule::unique('news')->ignore($id) // здесь это больше для эксперимента
            ],
            'message' => 'max:1000|required|filled',
            'category' => 'required:exists:categories,slug', // select у нас по слагу, поэтому проверяем слаг
            'image' => 'image|max:1000'
        ];
    }

    public static function messages()
    {
        return [
            'title.required' => 'Название не должно быть пустым',
            'title.unique' => 'Такое название уже есть',
            'message.required' => 'текст новости не должен быть пустым',
            'message.alpha_dash' => 'Мы хотим видеть в тексте только буквы, цифры, тире и знаки подчеркивания',
            'image.max' => 'Размер изображения не более 1 мегабайта',
            'image.image' => 'допускаются только следующие форматы: jpeg, png, gif, webp',
            'category.required' => 'Не выбрано поле "Категория". Если категорий нет, то сначала создайте их',
            'category.exists' => 'Задана несуществующая категория'
        ];
    }
}

