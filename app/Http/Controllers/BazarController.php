<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BazarController extends Controller
{
    protected $categories;

    public function __construct()
    {

        $this->categories = Category::all();
        view()->share('categories', $this->categories);
    }
    public function index(Request $request)
    {
        $query = Product::query();

        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('price', 'like', "%$search%")
                ->orWhereHas('category', function ($query) use ($search) {
                    $query->where('value', 'like', "%$search%");
                });
        }

        $products = $query->with('category')->paginate(6);
        $categories = Category::all();

        return view('web.products.index', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        $categories = Category::all();

        return view('web.products.show', compact('product', 'categories'));
    }

    public function filterByCategory($category_id)
    {
        $products = Product::where('category_id', $category_id)->with('category')->paginate(6);
        $categories = Category::all();

        return view('web.products.index', compact('products', 'categories'));
    }

    public function landingpage()
    {
        return view('web.landingpage');
    }

    
}
