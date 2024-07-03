<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function queryWere()
    {
      $products =  Product::where('category_id', '=', '4')->get();
      return view('web.products.index', compact('products')); 
    }

    public function whereEq()
    {
        $products = Product::where('category_id')->get();
      return view('web.products.index', compact('products'));  
    }

    public function whereIn()
    {
        $categoryIds=[1,2,3,4,5];
        $products = Product::whereIn('category_id', $categoryIds)->get();
        return view('web.products.index', compact('products'));
    }

    public function whereLike()
    {
    
        $products = Product::whereLike('name', 'like', '%ut%')->get();
        return view('web.products.index', compact('products'));
    }
    public function filter()
    {
        $query = Product::query();
        if(request()->has('category_id')){
            $query->where('category_id' , request()->input('category_id'));
        }

        if(request()->has('search')){
            $query->where('search' , 'like' , '%' . request()->input('search') . '%' );
        }


        $products = $query->get();
        return view('web.products.index', compact('products'));



    }
}
