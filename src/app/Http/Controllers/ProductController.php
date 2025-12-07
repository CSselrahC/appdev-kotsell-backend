<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Image;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        return Product::with('images')->get();
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:3072'
        ]);

        $product = Product::create($request->only(['name', 'description', 'price', 'stock']));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('products', 'public');
                $image = Image::create([
                    'name' => $imageFile->getClientOriginalName(),
                    'source' => $path,
                    'productId' => $product->productId
                ]);
                ProductImage::create([
                    'productId' => $product->productId,
                    'imageId' => $image->imageId
                ]);
            }
        }

        return response()->json($product->load('images'), 201);
    }

    public function show(Product $product)
    {
        return $product->load('images');
    }

    public function edit(Product $product)
    {
        
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->only(['name', 'description', 'price', 'stock']));
        return $product->load('images');
    }

    public function destroy(Product $product)
    {
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->source);
        }
        $product->delete();
        return response()->json(null, 204);
    }
}
