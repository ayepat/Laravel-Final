<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class BazarController extends Controller
{

    public function index()
    {
        $products = Product::all();

        return view('web.products.index', compact('products'));
    }


    public function show($id)
    {
        $product = Product::find($id);
        return view('web.products.show', compact('product'));
    }
}
