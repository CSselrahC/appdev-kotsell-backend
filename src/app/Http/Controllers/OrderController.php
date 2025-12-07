<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::with('customer')->get();
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $order = Order::create($request->all());
        return response()->json($order->load('customer'), 201);
    }

    public function show(Order $order)
    {
        return $order->load('customer');
    }

    public function edit(Order $order)
    {
        
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return $order->load('customer');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(null, 204);
    }
}
