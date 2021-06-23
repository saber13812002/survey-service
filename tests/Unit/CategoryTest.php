<?php

namespace Tests\Feature;

use App\Models\Categorizable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCategory()
    {
        Categorizable::factory(1)->create();
        $this->assertDatabaseHas('categorizables', [
            'categorizable_type' => 'App\Models\Package'
        ]);

    }
}
