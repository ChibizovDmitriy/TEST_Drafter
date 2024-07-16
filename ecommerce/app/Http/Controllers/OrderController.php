<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // Create a new order
    public function store(Request $request)
    {
        $order = new Order;
        // TODO: Fill order details and save...

        return response()->json(['message' => 'Order placed successfully']);
    }

    // Retrieve orders of the authenticated user
    public function index()
    {
        $orders = auth()->user()->orders;
        return response()->json($orders);
    }
}

