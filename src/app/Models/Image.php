<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model {
    use HasFactory;
    protected $fillable = ['name', 'source', 'productId'];
    protected $primaryKey = 'imageId';

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_images', 'imageId', 'productId');
    }
}
