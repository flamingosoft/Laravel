<?php

namespace App\Models;

use App\Rules\CategoryRules;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'slug'];

    public static function rules()
    {
        return [
            'title' => ['required', new CategoryRules()],
            'slug' => 'required|alpha'
        ];
    }

    public static function messages()
    {
        return [
            'title.required' => 'Название не должно быть пустым',
            'title.alpha_num' => 'Название должно состоять только из букв или цифр',
            'slug.required' => 'Slug нельзя делать пустым',
            'slug.alpha' => 'Slug должно содержать только текст'
        ];
    }
    public function News() {
        return $this->hasMany(News::class, 'categoryId')->get();
    }
}
