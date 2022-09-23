<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;

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

    public function create()
    {
        return view("products.create");
    }

    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());
        return redirect("/products");
    }

    public function update(Product $product, StoreProductRequest $request)
    {
        $product->update($request->validated());
        return redirect("/products/$product->id");
    }
}
