<?php

namespace Tests\Browser;

use App\Models\Category;
use App\Models\News;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    use DatabaseMigrations;

//    use RefreshDatabase;

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $faker = Factory::create("ru_RU");

        factory(Category::class)->create([
            'title' => "Тестовая категория",//$faker->realText(20, 3),
            'slug' => "test_category"//$faker->word(),
        ]);

        factory(News::class)->create([
            'title' => "Простая новость",//$faker->realText(20, 5),
            'message' => "Да, для тестирования Dusk нужны свои данные и на них мы будем тестить",//$faker->realText(300, 5),
            'private' => true, //$faker->boolean,
            'categoryId' => random_int(Category::query()->min('id'), Category::query()->max('id')),// $faker->randomNumber(1),
            'image' => null
        ]);


        $this->browse(function (Browser $browser) {
            $browser->visit('http://laravel5.8/news/')
                ->assertSee('Тестовая категория')
                ->assertSee('Простая новость')
                // переходим на новость по ее тексту
                ->clickLink("Простая новость")
                ->assertSee('Да, для тестирования Dusk')
                // переходим в категории
                ->clickLink('Все категории')
                ->assertSee('Тестовая категория')
                // переходим в раздел "создать категорию
                ->clickLink('Create new category')
                ->assertSee('Создание новой категории')
                // TODO: заполнить форму новой категории теми же полями, что есть сейчас
                // и проверить, чтобы нельзя было добавить категорию-дубликат как по названию, так и по слагу
                // проверить на основе сообщений об ошибках
                // TODO: потом заполнить форму правильно и сохранить
                // нас должно перекинуть на созданную категорию, проверить это
                ;
        });
    }
}
