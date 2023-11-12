<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index', [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        // Validar y almacenar la imagen
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Obtener el archivo de la solicitud
        $image = $request->file('image');

        // Generar un nombre único para la imagen
        $imageName = time() . '.' . $image->extension();

        // Almacenar la imagen en la carpeta "images/books" dentro del disco público
        $imagePath = $image->storeAs('images/books', $imageName, 'public');

        // Crear el producto con la información, incluyendo la ruta de la imagen
        Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' =>  $imagePath,
            'author' => $request->input('author'),
            'editorial' => $request->input('editorial'),
            'year' => $request->input('year'),
            'language' => $request->input('language'),
            'stock' => $request->input('stock'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            // Otros campos del producto...
        ]);

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', [
            'Product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'Product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Obtener la ruta completa de la imagen
        $imagePath = $product->image;

        // Verificar si la imagen existe antes de intentar eliminarla
        if (Storage::disk('public')->exists($imagePath)) {
            // Eliminar la imagen asociada al producto
            Storage::disk('public')->delete($imagePath);
        }

        // Eliminar el producto
        $product->delete();

        return redirect('/products');
    }
}
