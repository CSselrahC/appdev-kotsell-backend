<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'stock'];
    protected $primaryKey = 'productId';

    public function images()
    {
        return $this->belongsToMany(Image::class, 'product_images', 'productId', 'imageId');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'productId', 'categoryId');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'productId');
    }
}
