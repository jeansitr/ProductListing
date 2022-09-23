<?php

namespace App\Http\Controllers;

use App\Models\Product;
use http\Env\Request;

class ProductController
{
    public function index()
    {
        return view('products.index', ['products' => Product::all()]);
    }

    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->to('/products');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function create(){
        return view("products.edit");
    }

    public function store(){
        $product = new Product;

        $product->title = request("title");
        $product->description = request("description");
        $product->price = request("price");
        $product->image = "/image/product/" . str_replace(" ", "_", $product->title) . ".png";

        $product->save();


        return redirect("/products");
    }

    public function update(Product $product){

        $product->title = request("title");
        $product->description = request("description");
        $product->price = request("price");
        $product->image = "/image/product/" . str_replace(" ", "_", $product->title) . ".png";

        $product->save();

        return redirect("/products/$product->id");
    }
}
