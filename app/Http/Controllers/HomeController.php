<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the home page with filtered products.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        $categoryId = $request->input('category');

        $productsQuery = Product::query();

        if ($query) {
            $productsQuery->where('name', 'like', '%' . $query . '%')
                          ->orWhere('description', 'like', '%' . $query . '%');
        }

        if ($categoryId) {
            $productsQuery->where('category_id', $categoryId);
        }

        $products = $productsQuery->get();
        $categories = Category::all();

        return view('home', compact('products', 'categories'));
    }
}
