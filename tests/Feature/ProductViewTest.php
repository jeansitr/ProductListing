<?php

namespace Tests\Feature;

use App\Models\Product;
use Tests\TestCase;

class ProductViewTest extends TestCase
{
    /** @test */
    public function products_are_displayed_in_index()
    {
        $products = Product::factory(12)->create();
        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertSeeText($products[rand(0, $products->count() - 1)]->title);
        self::assertEquals($response->viewData("products")->count(), $products->count());
    }

    /** @test */
    public function error_if_no_product_in_index()
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertSee("No products found");
    }

    /** @test */
    public function a_product_can_be_displayed()
    {
        $product = Product::factory()->create();

        $response = $this->get('/products/'.$product->id);
        $response->assertSeeText([$product->title, $product->description, $product->price]);
        $response->assertStatus(200);
    }

    /** @test */
    public function product_edit_form_gets_filed_when_accessed()
    {
        $product = Product::factory()->create();

        $response = $this->get('/products/'.$product->id.'/edit');
        $response->assertSee([$product->title, $product->description, $product->price]);
        $response->assertStatus(200);
    }
}
