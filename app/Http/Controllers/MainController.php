<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\ProductsFilterRequest;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Models\Subscription;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class MainController extends Controller
{

    public function index(FilterRequest $request)
    {
        $basket = new Basket();
        $order = $basket->getOrder();


        $data = $request->validated();
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $products = Product::filter($filter)->paginate(9)->withQueryString();
        $currencies = Currency::all();
        $categories = Category::all();
        return view('main', compact('products', 'categories', 'currencies', 'order'));
    }


    public function changeLocale($locale)
    {
        $availableLocales = ['ru', 'en'];
        if (!in_array($locale, $availableLocales)) {
            $locale = config('app.locale');
        }
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }


    public function changeCurrency($currencyCode)
    {
        $currency = Currency::byCode($currencyCode)->first();
        session(['currency' => $currency->code]);
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

    public function category(Category $category)
    {
//        $currencies = Currency::all();
//        $category = Category::where('code', $category->code)->first();
        return view('category', compact('category'));
    }

    public function categories()
    {

        return view('categories');
    }

    public function product(FilterRequest $request, $product_id)
    {
        $product = Product::where('id', $product_id)->firstOrFail();

        $data = $request->validated();
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $products = Product::filter($filter)->paginate(9)->withQueryString();

        $currencies = Currency::all();
        $categories = Category::all();

        Cookie::queue(Cookie::make('test1', $product_id, 10000000));
        return  redirect()->route('productshow', $product);

        return view('layouts.product', compact('product', 'products', 'currencies', 'categories'));
    }

    public function productshow(Request $request)
    {
        $product_id = Cookie::get('test1');
        $product = Product::where('id', $product_id)->firstOrFail();

        return view('layouts.productshow', compact('product'));
        
    }


}

