<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller

{
    protected $categories;

    public function __construct()
    {
        $this->middleware('auth');
        $this->categories = Category::all();
        view()->share('categories', $this->categories);
    }


    public function index()
    {
        return view('home');
    }
}
