<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return Cart::with(['customer', 'product'])->get();
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $cart = Cart::create($request->all());
        return response()->json($cart->load(['customer', 'product']), 201);
    }

    public function show(Cart $cart)
    {
        return $cart->load(['customer', 'product']);
    }

    public function edit(Cart $cart)
    {
        
    }

    public function update(Request $request, Cart $cart)
    {
        $cart->update($request->all());
        return $cart->load(['customer', 'product']);
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return response()->json(null, 204);
    }
}
