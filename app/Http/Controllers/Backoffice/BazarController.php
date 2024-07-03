<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Image;


class BazarController extends Controller
{

    public function landingpage()
    {
        return view('web.landingpage');
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
        
        $products = $query->with('category')->paginate(6); // Usar paginate() en lugar de get()
        $categories = Category::all();
    
        return view('backoffice.products.index', compact('products', 'categories'));
    }
    public function destroy(Product $product)
{
    $product->delete();

    return redirect()->route('backoffice.products.index')
                     ->with('success', 'Producto eliminado correctamente');
}

    


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('backoffice.products.create', compact('categories', 'tags'));
    }
    

    public function edit($id)
    {
        $categories = Category::all();
        $tags= Tag::all();
        $product = Product::find($id);
        return view('backoffice.products.edit', compact('product', 'categories', 'tags'));
    }

    public function update($id)
    {
        $categories = Category::all();
        $product = Product::find($id);


        $product->name = request()->input('name');
        $product->description = request()->input('description');
        $product->price = request()->input('price');
        $product->category_id = request()->input('category_id');
        $product->image_url = request()->input('image_url');

        $product->save();

        return redirect('/backoffice/products');
    }

    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validar la imagen
    ]);

    // Subir la imagen y recuperar el src
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('products', $filename, 'public'); // Guardar en el disco público

        // Crear un registro en la base de datos con ese src
        $image = new Image;
        $image->size = $file->getSize();
        $image->extension = $file->getClientOriginalExtension();
        $image->src = $filePath;
        $image->save();

        // Crear el producto
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->image_url = $filePath; // Asignar la URL de la imagen al producto

        $product->save();

        return redirect('/backoffice/products')->with('success', 'Producto creado exitosamente.');
    }

    return redirect('/backoffice/products')->with('error', 'Error al subir la imagen.');
}

    public function filterByCategory($category_id)
    {
        $products = Product::where('category_id', $category_id)->with('category')->paginate(6);
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('backoffice.products.index', compact('products', 'categories', 'tags'));
    
    }


}
