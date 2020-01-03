<?php

namespace Tests\Feature;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    use withFaker;

    public function testRead()
    {
        $product = factory(Product::class, 6)->create();

        $this->assertTrue(Product::count() == 6);
    }

    public function testCreate()
    {
        $product = factory(Product::class)->create();

        $this->assertDatabaseHas('products', [
            'name' => $product->name,
            'value' => $product->value,
            'quantity' => $product->quantity,
        ]);
    }

    public function testUpdate()
    {
        $product = factory(Product::class)->create();
        $product->name = $this->faker->name;

        $product->save();

        $this->assertDatabaseHas('products', [
            'name' => $product->name,
        ]);
    }
}
