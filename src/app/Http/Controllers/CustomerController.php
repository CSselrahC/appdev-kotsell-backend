<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        return Customer::all();
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request['password'] = Hash::make($request['password']);
        $customer = Customer::create($request->all());
        return response()->json($customer, 201);
    }

    public function show(Customer $customer)
    {
        return $customer;
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
        return $customer;
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json(null, 204);
    }
}
