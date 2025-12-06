<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::all();
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    public function show(Order $order)
    {
        return $order;
    }

    public function edit(Order $order)
    {
        
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return $order;
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(null, 204);
    }
}
