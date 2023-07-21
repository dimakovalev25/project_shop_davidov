<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Nette\Utils\Random;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('auth.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('auth.categories.form');
    }

    public function store(CategoryRequest $request)
    {
        $requestData = $request->validated();
//        $requestData = $request->all();
        $fileName = time().$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        $requestData["image"] = '/storage/'.$path;
        Category::create($requestData);
        return redirect()->route('categories.index');


 /*       $path = $request->file('image')->store('categories');
        $params = $request->all();
        $params['image'] = $path;
        Category::create($params);
        return redirect()->route('categories.index');*/


    }

    public function show(Category $category)
    {
        return view('auth.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('auth.categories.form', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        Storage::delete($category->image);
        $path = $request->file('image')->store('categories');
        $params = $request->all();
        $params['image'] = $path;
        $category->update($params);
        return redirect()->route('categories.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
