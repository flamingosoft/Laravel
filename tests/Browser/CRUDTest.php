<?php

namespace Tests\Browser;

use App\Models\Category;
use App\Models\News;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CRUDTest extends DuskTestCase
{
    use DatabaseMigrations;

//    use RefreshDatabase;

    public function testCategoryCreate()
    {
        dump('Тест создания категории');
        //$this->FreshDB();
        // тест на создание новой категории. КПоля не должны быть пустыми (проверить ошибки), после ошибки должны быть
        // заполнены все поля
        // ВАЖНОЕ: заголовок и SLUG не должны совпадать ни с одним из вариантов в базе (по-отдельности)
        $this->browse(function (Browser $browser) {
            $browser->visit(env('APP_URL') . "/news/category/create")
                // проверяем, что на странице ожидаемая форма с ожидаемым заголовком
                ->assertSee('Создание новой категории')
                // поля пустые
                ->assertInputValue('title', '')
                ->assertInputValue('slug', '')
                // заполняем поля
                ->type('title', 'Проверочная категория')
                ->type('slug', 'tested-category')
                // и пытаемся сохранить. Должно сохраниться, т.к. все введено верно
                ->press('Создать категорию')
                // если сохранилось, то мы должны попать на просмотр категории и там должны вывестись наши новые данные
                // включаая id=1, т.к. у нас была одна категория и после добавления стала еще 1, т.е. 0, 1
                ->assertSee('Название: Проверочная категория')
                ->assertSee('id: 1')
                ->assertSee('SLUG: tested-category');
            // сделаем скриншот, чтобы посмотреть что действительно на финальном этапе мы имеем что нужно
            $browser->screenshot('testCategoryCreateSaved');
        });
        return true;
    }

    public function FreshDB()
    {
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

    }

    public function testNewsCreate()
    {
        // тест на создание новой категории. КПоля не должны быть пустыми (проверить ошибки), после ошибки должны быть
        // заполнены все поля
        // ВАЖНОЕ: заголовок и SLUG не должны совпадать ни с одним из вариантов в базе (по-отдельности), но! они могут быть
        // равны себе прежним (мы же редактируем, значит можем сохранить без внесения изменений)
        // при этом из изменений у нас может быть только картинка или private поле!

        // попробуем сначала на пустой базе. Там нет категорий и соотв. новость не должна создаться ни при каких условиях и надо выдать сообщение
        // об этом

        $this->browse(function (Browser $browser) {

//            $this->withSession(['DUSK' => 'true']);
//            Session::put('DUSK', 'true');

            // по умолчанию для продакшена у нас кнопка залочена, если категорий нет, но ничто не мешает отправить
            // запрос к серверу помимо формы, поэтому исключительно для теста кнопку отключим кукой и протестируем
            // что при создании новости без категории у нас выплюнется правильное сообщение

//            $browser->cookie("DUSK", "test", time()+3600);

            $browser->visit(env('APP_URL') . "/admin")
                // проверяем, что на странице есть нужная ссылка в меню
                ->assertSee('Добавить новость')
                ->clickLink('Добавить новость');

            $browser->screenshot("CreateEmptyNewsBeforeJSunlock");

            $browser
                // разлочим кнопку через JS, т.к. сейчас она Disabled
                ->driver->executeScript(
                    'document.querySelector(\'[type="submit"][disabled]\').removeAttribute(\'disabled\')'
                );
            $browser->screenshot("CreateEmptyNewsJSunlock");

            $browser
                // поля пустые
                ->assertInputValue('title', '')
                ->assertInputValue('message', '')
                ->assertNotChecked('private')
                // категория не должна быть пустой
                ->assertNotSelected('category', '')
                // пытаемся создать пустую новость
                ->press('Создать новость')
                // в обычной жизни мы сюда не попадем, но из-за куки DUSK попадем и увидим все сообщения о неправильно
                // заполнненных полях
                ->assertSee(News::messages()['title.required'])
                ->assertSee(News::messages()['category.required'])
                ->assertSee(News::messages()['message.required'])
            ;
            $browser->screenshot("CreateEmptyNewsWithDUSKCookie");
            // создадим тестовую базу обязательно!

            $browser->deleteCookie("DUSK");

            $this->FreshDB();

            $browser->visit(env('APP_URL') . "/admin")
                ->clickLink('Добавить новость');
            $browser->screenshot('testNewsCreateSavedWithoutDUSKCookie');

            $browser
                // заполняем поля
                ->type('title', 'Проверочная новость')
                ->type('message', 'Ну какое-то сообщение')
                ->select('category', 'tested-category')
                // и пытаемся сохранить. Должно сохраниться, т.к. все введено верно
                ->press('Создать новость')
                // если сохранилось, то мы должны попать на просмотр новости и там должны вывестись наши новые данные
                // включаая id=1, т.к. у нас была одна категория и после добавления стала еще 1, т.е. 0, 1
                ->assertPathIs('/news/2')
//                ->assertSee('Проверочная новость')
//                ->assertSee('Ну какое-то сообщение')
                ;
            // сделаем скриншот, чтобы посмотреть что действительно на финальном этапе мы имеем что нужно
            $browser->screenshot('testNewsCreateSaved');
        });
        return true;
    }

//@test
    public function no_browser_errors()
    {
        $this->browse(function ($browser) {
            $this->assertEmpty($browser->driver->manage()->getLog('browser'));
        });
    }
}
