<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function belongsTo()
    {
        $product = Product::find();
    }

    public function hasOne()
    {
        $image = Image::find();
    }
    public function hasMany()
    {
       $category = Category::find();
      // foreach($category->products as $product);
    }
    public function belongsToMany()
    {
        $product = Product::find(1);
    }

}
