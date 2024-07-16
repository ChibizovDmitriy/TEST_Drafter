<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Retrieve a list of products with optional filtering
    public function index(Request $request)
    {
        $query = Product::query();

        // Filter by category_id if provided
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filter by minimum price if provided
        if ($request->has('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }

        // Filter by maximum price if provided
        if ($request->has('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }

        // TODO: Implement filtering by attributes...

        return response()->json($query->get());
    }

    // Retrieve a single product by its slug
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return response()->json($product);
    }
}

