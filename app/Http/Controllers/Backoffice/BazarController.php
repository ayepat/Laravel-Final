<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class BazarController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('backoffice.products.index', compact('products'));
    }

    public function create()
    {
        $products = Product::all();
        return view('backoffice.products.create', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('backoffice.products.edit', compact('product'));
    }

    public function update($id)
    {
        $product = Product::find($id);

        $product->name = request()->input('name');
        $product->description = request()->input('description');
        $product->price = request()->input('price');
        $product->category_id = request()->input('category_id');
        $product->image_url = request()->input('image_url');

        $product->save();

        return redirect('/backoffice/products');
    }

    public function store()
    {
        $product = new Product;

        $product->name = request()->input('name');
        $product->description = request()->input('description');
        $product->price = request()->input('price');
        $product->image_url = request()->input('image_url');
        $product->category_id = request()->input('category_id');

        $product->save();

        return redirect('/backoffice/products');
    }
}
