<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return Admin::all();
    }

    public function store(Request $request)
    {
        $admin = Admin::create($request->all());  // ← NO HASHING
        return response()->json($admin, 201);
    }

    public function show(Admin $admin)
    {
        return $admin;
    }

    public function update(Request $request, Admin $admin)
    {
        $admin->update($request->all());  // ← NO HASHING
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

        $admin = Admin::where('email', $request->email)
                     ->where('password', $request->password)  // ← PLAINTEXT CHECK
                     ->first();
        
        if ($admin) {
            return response()->json([
                'message' => 'Login successful',
                'admin' => $admin,
                'token' => base64_encode($request->email . ':' . $request->password)
            ], 200);
        }
        
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}
