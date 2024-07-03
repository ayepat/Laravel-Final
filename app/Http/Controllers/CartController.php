<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $categories;

    public function __construct()
    {
        $this->categories = Category::all();
        view()->share('categories', $this->categories);
    }
        public function add(Request $request)
        {
            $productId = $request->input('id');
            $cart = session()->get('cart', []);
    
            if (!in_array($productId, $cart)) {
                $cart[] = $productId;
                session()->put('cart', $cart);
            }
    
            return redirect()->route('web.cart.checkout');
        }
    
        public function checkout()
        {
            $categories = Category::all();
            $cart = session()->get('cart', []);
            $products = Product::whereIn('id', $cart)->get();
    
            return view('web.cart.checkout', compact('products', 'categories'));
        }
    
        public function buy()
        {
            $categories = Category::all();

            session()->forget('cart');
            return view('web.cart.thankyou', compact('categories'));
        }
    }

