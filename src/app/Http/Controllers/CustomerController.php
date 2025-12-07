<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        return Customer::with(['carts.product', 'orders'])->get();
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request['password'] = Hash::make($request['password']);
        $customer = Customer::create($request->all());
        return response()->json($customer->load(['carts.product', 'orders']), 201);
    }

    public function show(Customer $customer)
    {
        return $customer->load(['carts.product', 'orders']);
    }

    public function edit(Customer $customer)
    {
        
    }

    public function update(Request $request, Customer $customer)
    {
        if ($request->has('password')) {
            $request['password'] = Hash::make($request['password']);
        }
        $customer->update($request->all());
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

        $customer = Customer::where('email', $request->email)->first();
        
        if ($customer && Hash::check($request->password, $customer->password)) {
            return response()->json([
                'message' => 'Login successful',
                'customer' => $customer,
                'token' => base64_encode($request->email . ':' . $request->password)
            ], 200);
        }
        
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}
