<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomePageStatus200Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */   // -- указание @test важно, чтобы phpunit понял, что этот метод и есть тест
    public function Home200Test()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
