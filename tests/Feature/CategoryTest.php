<?php

namespace Tests\Feature;

use App\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    use withFaker;

    public function testRead()
    {
        $category = factory(Category::class, 10)->create();

        $this->assertTrue(Category::count() == 10);
    }

    public function testCreate()
    {
        $category = factory(Category::class)->create();

        $this->assertDatabaseHas('categories', [
            'name' => $category->name,
        ]);
    }

    public function testUpdate()
    {
        $category = factory(Category::class)->create();
        $category->name = $this->faker->name;

        $category->save();

        $this->assertDatabaseHas('categories', [
            'name' => $category->name,
        ]);
    }
}
