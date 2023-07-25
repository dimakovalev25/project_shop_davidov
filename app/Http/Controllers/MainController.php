<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFilterRequest;
use App\Models\Category;
use App\Models\Models\Subscription;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{

    public function changeLocale($locale)
    {
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }

    public function subscribe(Request $request, Product $product)
    {

        Subscription::create([
            'email' => $request->email,
            'product_id' => $product->id
        ]);
        return redirect()->back()->with('success', 'upon receipt of the goods we will contact you');
    }

    public function index(ProductsFilterRequest $request)
    {
        $productsQuery = Product::query();
//        $productsQuery = Product::with('category');

        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }

        foreach (['hit', 'new', 'recommend'] as $field) {
            if ($request->has($field)) {
                $productsQuery->where($field, 1);
            }
        }


        $products = $productsQuery->paginate(3)->withPath($request->getQueryString());
//        dd($productsQuery);
        return view('index', compact('products'));
    }

    public function category(Category $category)
    {
//        $category = Category::where('code', $category->code)->first();
        return view('category', compact('category'));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function product($product_id)
    {
        $product = Product::where('id', $product_id)->firstOrFail();;
        return view('product', compact('product'));
    }


}

