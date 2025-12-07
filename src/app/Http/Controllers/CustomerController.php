<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return Customer::with(['carts.product', 'orders'])->get();
    }

    public function store(Request $request)
    {
        $customer = Customer::create($request->all());  // ← NO HASHING
        return response()->json($customer->load(['carts.product', 'orders']), 201);
    }

    public function show(Customer $customer)
    {
        return $customer->load(['carts.product', 'orders']);
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());  // ← NO HASHING
        return $customer->load(['carts.product', 'orders']);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json(null, 204);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $customer = Customer::where('email', $request->email)
                           ->where('password', $request->password)  // ← PLAINTEXT CHECK
                           ->first();
        
        if ($customer) {
            return response()->json([
                'message' => 'Login successful',
                'customer' => $customer,
                'token' => base64_encode($request->email . ':' . $request->password)
            ], 200);
        }
        
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}
