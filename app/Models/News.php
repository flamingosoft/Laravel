<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Category;

class News extends Model
{
    protected $fillable = ['title', 'message', 'private', 'image', 'categoryId'];

    public function Category() {
        return $this::belongsTo(Category::class,  'categoryId')->first();
    }

}
