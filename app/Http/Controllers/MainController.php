<?php

namespace App\Http\Controllers;

use App\Http\Filters\ProductFilter;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\ProductsFilterRequest;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Models\Subscription;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{

    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $products = Product::filter($filter)->paginate(9)->withQueryString();;
/*        $currencies = Currency::all();
        $categories = Category::all();*/
        return view('index', compact('products'));
    }

    /*    public function index(ProductsFilterRequest $request)
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


            $products = $productsQuery->paginate(6)->withPath($request->getQueryString());
    //        $products = $productsQuery->all()->withPath($request->getQueryString());
            $currencies = Currency::all();
            return view('index', compact('products', 'currencies'));
        }*/

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
//        $currencies = Currency::all();
//        $categories = Category::all();
        return view('categories');
    }

    public function product($product_id)
    {
//        $currencies = Currency::all();
        $product = Product::where('id', $product_id)->firstOrFail();;
        return view('product', compact('product'));
    }


}

