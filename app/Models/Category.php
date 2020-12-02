<?php

namespace App\Models;

use App\Rules\SimpleTextRules;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Category extends Model
{

    protected $fillable = ['title', 'slug'];

    public static function rules($category)
    {
        // TODO: сделать
        return [
            'title' => [
                'required',
                new SimpleTextRules(),
                Rule::unique('categories')->ignore($category->id)
            ],
            'slug' => ['required', 'alpha_dash',
                Rule::unique('categories')->ignore($category->id)
            ]
        ];
    }

    public static function messages()
    {
        return [
            'title.unique' => 'Название категории должно быть уникальным. Такое название уже имеется',
            'title.required' => 'Название не должно быть пустым',
            'title.alpha_num' => 'Название должно состоять только из букв или цифр',
            'slug.required' => 'Slug нельзя делать пустым',
            'slug.alpha' => 'Slug должно содержать только текст',
            'slug.unique' => 'Такой Slug уже имеется, придумайте другой'
        ];
    }

    public function News() {
        return $this->hasMany(News::class, 'categoryId')->get();
    }
}
