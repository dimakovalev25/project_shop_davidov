<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{

    public function index()
    {
        $properties = Property::all();
        return view('auth.properties.index', compact('properties'));
//        return 'property!';
    }

    public function create()
    {
        return view('auth.properties.form');
    }

    public function store(PropertyRequest $request)
    {
        $data = $request->validated();
        Property::create($data);
        return redirect()->route('properties.index');
    }

    public function show(Property $property)
    {
        return view('auth.properties.show', compact('property'));
    }

    public function edit(Property $property)
    {
        return view('auth.properties.form',compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        $params = $request->all();
        $property->update($params);
        return redirect()->route('properties.index');
    }


    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index');
    }
}
