<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        return Image::with(['product', 'products'])->get();
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $image = Image::create($request->all());
        return response()->json($image->load(['product', 'products']), 201);
    }

    public function show(Image $image)
    {
        return $image->load(['product', 'products']);
    }

    public function edit(Image $image)
    {
        
    }

    public function update(Request $request, Image $image)
    {
        $image->update($request->all());
        return $image->load(['product', 'products']);
    }

    public function destroy(Image $image)
    {
        Storage::disk('public')->delete($image->source);
        $image->delete();
        return response()->json(null, 204);
    }
}
