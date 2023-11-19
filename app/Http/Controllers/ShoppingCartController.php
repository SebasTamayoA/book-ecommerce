<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Http\Requests\ShoppingCartRequest;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('shopping_carts.index', [
            'shopping_carts' => ShoppingCart::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shopping_carts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShoppingCartRequest $request)
    {
        ShoppingCart::create($request->all());
        return redirect('/shopping_carts');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShoppingCart $shoppingCart)
    {
        return view('shopping_carts.show', [
            'ShoppingCart' => $shoppingCart
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShoppingCart $shoppingCart)
    {
        return view('shopping_carts.edit', [
            'ShoppingCart' => $shoppingCart
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShoppingCartRequest $request, ShoppingCart $shoppingCart)
    {
        $shoppingCart->update($request->all());
        return redirect('/shopping_carts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShoppingCart $shoppingCart)
    {
        $shoppingCart->delete();
        return redirect('/shopping_carts');
    }

    /**
     * Agregar producto al carrito.
     */
    public function addToCart(Request $request, Product $product)
    {
        // Validación de la solicitud
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        // Lógica para agregar al carrito
        // Puedes utilizar la dependencia Gloudemans\Shoppingcart\Facades\Cart aquí

        // Ejemplo sin Gloudemans\Shoppingcart\Facades\Cart
        $cartItem = new ShoppingCart([
            'product_id' => $product->id,
            'quantity' => $request->input('quantity'),
            'amount' => $product->price * $request->input('quantity'),
        ]);

        // Asocia el carrito a un usuario si es necesario
        // $cartItem->user_id = auth()->id();

        $cartItem->save();

        // Puedes redirigir a la página de carrito o a donde desees
        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.');
    }
}
