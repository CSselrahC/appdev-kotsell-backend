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
}
