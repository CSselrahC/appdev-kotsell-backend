<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return Cart::all();
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $cart = Cart::create($request->all());
        return response()->json($cart, 201);
    }

    public function show(Cart $cart)
    {
        return $cart;
    }

    public function edit(Cart $cart)
    {
        
    }

    public function update(Request $request, Cart $cart)
    {
        $cart->update($request->all());
        return $cart;
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return response()->json(null, 204);
    }
}
