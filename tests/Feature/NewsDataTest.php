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
    /** @test */
    public function NewsAllTest()
    {
        $this->assertTrue(is_object(News::all()));
    }

    /** @test */
    public function StructureTest()
    {
        $this->assertTrue($this->is_correct_structure(News::all()));
    }

    /** @test */
    public function RoutesTest() {
        $this->assertTrue($this->isTitle('home', 'Alexander Khayev laravel homework: Main page'));
        $this->assertTrue($this->isTitle('about', 'Alexander Khayev laravel homework: About Us'));
        $this->assertTrue($this->isTitle('news.home', 'Alexander Khayev laravel homework: All news'));
//        $response->assertStatus(200);
    }

    protected function isTitle($route, $title) {
      return  strpos($this->get(route($route))->content(), $title) > 0;
    }

    protected function is_correct_structure($object) {
        return is_object($object) &&
            !is_null($object[0]);
    }
}
