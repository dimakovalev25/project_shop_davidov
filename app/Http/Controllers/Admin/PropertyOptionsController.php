<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyOptionsRequest;
use App\Models\Property;
use App\Models\PropertyOptions;
use Illuminate\Http\Request;

class PropertyOptionsController extends Controller
{

    public function index()
    {
        $properties_options = PropertyOptions::all();
        return view('auth.property_options.index', compact('properties_options'));
    }

    public function create()
    {
        $properties = Property::all();
        return view('auth.property_options.form', compact('properties'));

    }

    public function store(PropertyOptionsRequest $request)
    {
        $data = $request->validated();
        PropertyOptions::create($data);

        return redirect()->route('property_options.index');

    }

    public function show(PropertyOptions $property_option)
    {
        return view('auth.property_options.show', compact('property_option'));
    }

    public function edit(PropertyOptions $property_option)
    {
        $properties = Property::all();
        return view('auth.property_options.form', compact('property_option', 'properties'));
    }

    public function update(Request $request, PropertyOptions $property_option)
    {
        $params = $request->all();
//        dd($params);
        $property_option->update($params);

        return redirect()->route('property_options.index');
    }

    public function destroy(PropertyOptions $property_options)
    {
        $property_options->delete();
        return redirect()->route('auth.property_options.index');
    }
}
