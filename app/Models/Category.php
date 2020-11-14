<?php

namespace App\Models;

use App\Rules\CategoryRules;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'slug'];

    public static function rules()
    {
        // TODO: сделать
        return [
            'title' => ['unique:categories', 'required', new CategoryRules()],
            'slug' => 'unique:categories|required|alpha'
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
