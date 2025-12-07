<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return Admin::all();
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request['password'] = Hash::make($request['password']);
        $admin = Admin::create($request->all());
        return response()->json($admin, 201);
    }

    public function show(Admin $admin)
    {
        return $admin;
    }

    public function edit(Admin $admin)
    {
        
    }

    public function update(Request $request, Admin $admin)
    {
        if ($request->has('password')) {
            $request['password'] = Hash::make($request['password']);
        }
        $admin->update($request->all());
        return $admin;
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return response()->json(null, 204);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();
        
        if ($admin && Hash::check($request->password, $admin->password)) {
            return response()->json([
                'message' => 'Login successful',
                'admin' => $admin,
                'token' => base64_encode($request->email . ':' . $request->password)
            ], 200);
        }
        
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}
