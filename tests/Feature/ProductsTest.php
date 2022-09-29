<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_product_can_be_added()
    {
        $response = $this->post('/products', ['title' => 'This be new', 'description' => 'Still new desc', 'price' => 1225]);

        $response->assertStatus(302);

        self::assertEquals(1, Product::where('title', 'This be new')->get()->count());
    }

    /** @test */
    public function error_when_missing_values_post()
    {

        $response = $this->post('/products', ['title' => '', 'description' => 'Still new desc', 'price' => 1225]);

        $response->assertSessionHasErrors("title");
        $response->assertStatus(302);
    }

    /** @test */
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
    public function error_when_missing_values_put(){
        $product = Product::factory()->create(['title' => 'This be new', 'description' => 'Still new desc', 'price' => 1234]);

        $response = $this->put('/products/'.$product->id, ['title' => '', 'description' => 'Still new desc', 'price' => 1225]);

        $response->assertSessionHasErrors("title");
        $response->assertStatus(302);
    }

    /** @test */
    public function a_product_can_be_deleted()
    {
        $product = Product::factory()->create();

        $response = $this->delete("/products/$product->id");

        $response->assertStatus(302);
        self::assertNull(Product::find($product->id));
    }
}
