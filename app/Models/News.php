<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;


class News extends Model
{
    private static $instance = null;

    public static function get(): News
    {
        if (is_null(static::$instance)) {
            static::$instance = new News();
        }
        return static::$instance;
    }

    public function addNews($title, $category, $message, $private): int
    {
        return DB::table('news')
            ->insertGetId([
                'title' => $title,
                'message' => $message,
                'private' => $private == 'private',
                'categoryId' => Categories::get()->getCategoryByTitle($category)
            ]);

//        $data = $this::getData();
//        $id = array_push($data,
//            ['id' => 1 + max(array_keys($data)),
//                'title' => $title,
//                'categoryId' => Categories::get()->getCategoryByTitle($category),
//                'message' => $message,
//                'private' => $private == "private"
//            ]
//        );
//        News::setData($data);
//        return --$id;
    }

    public function getAllNews()
    {
        return DB::table('news')->get();
    }

    public function getNewsById(int $id)
    {
        return DB::table('news')
            ->where('id', '=', $id)
            ->limit(1)
            ->first();
    }

    public function getNewsByCategory(int $categoryId)
    {
        return DB::table('news')
            ->where("categoryId", "=", $categoryId)
            ->get("*");

//        $res = array_filter($this->getData(),
//            function ($elem) use ($categoryId) {
//                return array_key_exists('categoryId', $elem)
//                    && $elem['categoryId'] == $categoryId;
//            }
//        );
//        return $res;
    }

    protected function getContainerName(): string
    {
        return 'news';
    }

    protected function setDefault(): void
    {
        static::setData([
            0 => [
                'id' => 0,
                'title' => 'Новость по cpu',
                'message' => 'что вам сказать :)',
                'categoryId' => 0
            ],
            1 => [
                'id' => 1,
                'title' => 'Ну это совсеем другая новость про cpu',
                'message' => 'Совершенно другая',
                'categoryId' => 0
            ],
            2 => [
                'id' => 2,
                'title' => 'это про материнки',
                'message' => 'материнки они такие материнки!',
                'categoryId' => 1
            ]
        ]);
    }
}
