<?php

namespace Tests\Feature;

use App\Models\News;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsDataTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNews()
    {
        $this->assertTrue(is_array(News::get()->getAllNews()));
    }

    public function testStructure()
    {
        $this->assertTrue($this->is_correct_structure(News::get()->getAllNews()));
    }

    public function testRoutes() {
        $this->assertTrue($this->isTitle('home', 'Alexander Khayev laravel homework: Main page'));
        $this->assertTrue($this->isTitle('about', 'Alexander Khayev laravel homework: About Us'));
        $this->assertTrue($this->isTitle('news.home', 'Alexander Khayev laravel homework: All news'));
//        $response->assertStatus(200);
    }

    protected function isTitle($route, $title) {
      return  strpos($this->get(route($route))->content(), $title) > 0;
    }

    protected function is_correct_structure($object) {
        return is_array($object) &&
            !is_null($object[0]);
    }
}
