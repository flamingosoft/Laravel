<?php

namespace Tests\Browser;

use App\Models\Category;
use App\Models\News;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    use DatabaseMigrations;
   // use RefreshDatabase;

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
            $browser->visit(gethostname(). '/news/')
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
                ->type("title", "<><>")
                ->press("save")
                ->assertInputValue("title", "<><>")
                ->assertSee("Должен быть обычный текст из букв, цифр, знаков препинания")
                ->assertSee("Slug нельзя делать пустым")
                ->clear("title")
                ->clear("slug")
                ->type("title", "Тестовая категория")
                ->type("slug", "test_category")
                ->press("save")
                ->assertSee("Название категории должно быть уникальным")
                ->clear("title")
                ->clear("slug")
                ->type("title", "Новая категория")
                ->type("slug", "newCategory")
                ->press("save")
                ->assertSee("id: 2")
                ->clickLink("Новости")
                ->clickLink("Новая категория")
                ->assertSee("Нет новостей в данной рубрике");
            $browser->screenshot("test.jpg");
        });
    }
}
