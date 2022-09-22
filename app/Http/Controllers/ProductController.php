<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController
{
    public function index()
    {
        return view("products.index", ["products" => Product::all()]);
    }

    public function show(Product $product)
    {
        return view("products.show", ["product" => $product]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->to('/products');
    }
}
