<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;

class AttributeController extends Controller
{
    // Retrieve all attributes
    public function index()
    {
        return response()->json(Attribute::all());
    }

    // Create a new attribute
    public function store(Request $request)
    {
        $attribute = Attribute::create($request->all());
        return response()->json($attribute, 201);
    }

    // Update an existing attribute
    public function update(Request $request, Attribute $attribute)
    {
        $attribute->update($request->all());
        return response()->json($attribute);
    }

    // Delete an attribute
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        return response()->json(null, 204);
    }
}

