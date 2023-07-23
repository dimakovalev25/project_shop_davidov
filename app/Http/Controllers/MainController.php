<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index(Request $request)
    {
        $productsQuery = Product::query();

        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }

        foreach (['hit', 'new', 'recommend'] as $field){
            if ($request->has($field)) {
                $productsQuery->where($field,1);
            }
        }



        $products = $productsQuery->paginate(6);
//        dd($productsQuery);
        return view('index', compact('products'));
    }

    public function category($code)
    {
        $category = Category::where('code', $code)->first();
        return view('category', compact('category'));
    }

    public function categories()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function product($product_id)
    {
        $product = Product::find($product_id);

        return view('product', compact('product'));
    }


}

