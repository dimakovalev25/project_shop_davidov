<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


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

        $requestData = $request->all();
        foreach (['new', 'hit', 'recommend'] as $fieldName) {
            if(isset($requestData[$fieldName])){
                $requestData[$fieldName] = 1;
            }
        }
//        dd($requestData);

        $fileName = time().$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        $requestData["image"] = '/storage/'.$path;
        Product::create($requestData);
        return redirect()->route('products.index');

    }

/*    public function store2(Request $request)
    {
        $data = $request->all();
        foreach (['new', 'hit', 'recommend'] as $fieldName) {
            if(isset($data[$fieldName])){
                $data[$fieldName] = 1;
            }
        }
        $filename = $data['image']->getClientOriginalName();
        $data['image']->move(Storage::path('\public\images').$filename);

        //Создаем миниатюру изображения и сохраняем ее
        $thumbnail = Image::make(Storage::path('\public\images').$filename);
        $thumbnail->fit(300, 300);
        $thumbnail->save(Storage::path('\public\images').$filename);

        //Сохраняем новость в БД
        $data['image'] = $filename;
        Product::create($data);
        return redirect()->route('products.index');
    }*/





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
        foreach (['new', 'hit', 'recommend'] as $fieldName) {
            if(isset($requestData[$fieldName])){
                $requestData[$fieldName] = 1;
            }
        }
        return redirect()->route('products.index');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
