<?php

namespace App\Models;

use App\Rules\SimpleTextRules;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class News extends Model
{
    protected $fillable = ['title', 'message', 'private', 'image', 'categoryId'];

    public static function rules(News $news = null)
    {
        return [
            'title' => [
                'required',
                'min:10',
                Rule::unique('news')->ignore($news ? $news->id : 0) // здесь это больше для эксперимента
            ],
            'message' => [
                'max:1000',
                'required',
                'filled',
                new SimpleTextRules()
            ],
            'category' => 'required:exists:categories,slug', // select у нас по слагу, поэтому проверяем слаг
            'image' => 'image|max:1000'
        ];
    }

    public static function attributes()
    {
        return [
            'title' => '"Заголовок новости"',
            'message' => '"Описание новости"',
            'category' => '"Категория"',
            'image' => '"Изображение"'
        ];
    }

    public static function messages()
    {
        return [
//            'title.required' => 'Название не должно быть пустым',
//            'title.unique' => 'Такое название уже есть',
//            'message.required' => 'текст новости не должен быть пустым',
//            'message.alpha_dash' => 'Мы хотим видеть в тексте только буквы, цифры, тире и знаки подчеркивания',
//            'image.max' => 'Размер изображения не более 1 мегабайта',
//            'image.image' => 'допускаются только следующие форматы: jpeg, png, gif, webp',
//            'category.required' => 'Не выбрано поле "Категория". Если категорий нет, то сначала создайте их',
//            'category.exists' => 'Задана несуществующая категория'
        ];
    }

    public function Category()
    {
        return $this::belongsTo(Category::class, 'categoryId')->first();
    }
}

