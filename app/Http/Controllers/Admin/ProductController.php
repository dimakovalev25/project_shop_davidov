<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::all();
        return view('auth.products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('auth.products.form', compact('categories'));
    }
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('products.index');

    }
    public function show(Product $product)
    {
        return view('auth.products.show', compact('product'));
    }
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('auth.products.form', compact('product', 'categories'));
    }
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
