<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Seller;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    /** @test */
    public function a_product_can_be_added()
    {
        $attributes = Product::factory()->make(['title' => 'New product'])->toArray();
        $this->post('/products', $attributes)
            ->assertRedirect('/products');

        $this->assertDatabaseHas('products', ['title' => 'New product']);
    }

    /** @test */
    public function error_when_missing_values_post()
    {
        $product = Product::factory()->raw(['title' => '']);

        $response = $this->post('/products', $product);

        $response->assertSessionHasErrors('title');
        $response->assertStatus(302);
    }

    /** @ignore */
    public function a_product_can_be_edited_and_update_at_changes()
    {
        //$this->withoutExceptionHandling();

        //Creates product the sleeps 1 second to make sure that the timestamps are different!
        $oldProduct = Product::factory()->create();
        sleep(1);

        $response = $this->put("/products/$oldProduct->id", ['title' => 'This be new', 'description' => 'Still new desc']);

        $product = Product::findOrFail($oldProduct->id);

        $response->assertStatus(302);
        self::assertEquals('This be new', $product->title);
        self::assertEquals('Still new desc', $product->description);
        self::assertEquals($product->price, $oldProduct->price);
        self::assertTrue($product->updated_at->gt($oldProduct->updated_at));
    }

    /** @test */
    public function error_when_missing_values_put()
    {
        $product = Product::factory()->create(['title' => 'This be new']);

        $response = $this->put('/products/'.$product->id, ['title' => '']);

        $response->assertSessionHasErrors('title');
        $response->assertStatus(302);
    }

    /** @test */
    public function a_product_can_be_deleted()
    {
        $product = Product::factory()->create();

        $response = $this->delete("/products/$product->id");

        $response->assertStatus(302);

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
