<?php

namespace App\Models;


class Categories extends Model
{
    private static $instance = null;

    public static function get(): Categories
    {
        if (is_null(static::$instance)) {
            static::$instance = new Categories();
        }
        return static::$instance;
    }

    protected  function getContainerName(): string {
        return 'categories';
    }

    protected  function setDefault(): void {
        $this::setData( [
            0 => [
                'id' => 0,
                'title' => 'процессоры',
                'slug' => 'cpu'
            ],
            1 => [
                'id' => 1,
                'title' => 'материнские платы',
                'slug' => 'motherboards'
            ],
            2 => [
                'id' => 2,
                'title' => 'жетские диски',
                'slug' => 'hdd'
            ]
        ]);
    }



    /**
     * все категории в формате [ $categoryId ][ { 'title', 'slug' } ]
     * @return array
     */
    public  function getAllCategories(): array {
        return $this->getData();
    }

    /**
     * данные о категории в виде [ { 'title', 'slug' } ]
     * @param int $id
     * @return array
     */
    public  function getCategoryById(int $id): array {
        if (array_key_exists($id, $this->getData()))
            return $this->getData()[$id];
        else
            return [];
    }

    /**
     * Ищем Id категории по её slug описанию
     * @param string $slug
     * @return int | FALSE
     */
    public  function getCategoryByTitle(string $slug): int {
        return array_search($slug, array_column($this->getData(), 'slug'));
    }
}
