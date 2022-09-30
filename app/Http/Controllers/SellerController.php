<?php

namespace App\Http\Controllers;

use App\Models\Seller;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sellers/index', ['sellers' => Seller::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id

     S*/
    public function show($id)
    {
        return view('sellers/show', ['seller' => Seller::with('products')->get()->where('id', $id)->first()]);
    }
}
