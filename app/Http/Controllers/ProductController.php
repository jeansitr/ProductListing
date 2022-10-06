<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    public function index()
    {
        return view('products.index', ['products' => Product::with('seller')->get()]);
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
        return view('products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $seller = [];
        if (! $request->seller_id) {
            $seller = ['seller_id' => auth()->user()->id];
        }

        auth()->user()->products()->create($request->validated() + $seller);

        return redirect('/products');
    }

    public function update(Product $product, UpdateProductRequest $request)
    {
        $product->update($request->validated());

        return redirect("/products/$product->id");
    }
}
