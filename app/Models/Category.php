<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'slug'];
    /**
     * все категории в формате [ $categoryId ][ { 'title', 'slug' } ]
     */
    public static function getAllCategories() {
         return static::all();
    }

    /**
     * данные о категории в виде [ { 'title', 'slug' } ]
     * @param int $id
     * @return mixed
     */
    public static function getCategoryById(int $id) {
        return static::where('id', '=', $id)->limit(1)->first();
    }

    /**
     * Ищем Id категории по её slug описанию
     * @param string $slug
     * @return mixed
     */
    public static function getCategoryBySlug(string $slug) {
        return static::where('slug', '=', $slug)
            ->get()
            ->first();
    }

    public function News() {
        return $this->hasMany(News::class, 'categoryId')->get();
    }
}
