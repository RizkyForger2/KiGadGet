<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(12);
        $categories = Category::all();
        return view('home', compact('products', 'categories'));
    }

public function show($id)
{
    $product = Product::findOrFail($id);
    $relatedProducts = Product::where('category_id', $product->category_id)
                              ->where('id', '!=', $id)
                              ->get();

    return view('products.product-detail', compact('product', 'relatedProducts'));
}

}