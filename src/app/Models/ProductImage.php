<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model {
    use HasFactory;
    protected $fillable = ['productId', 'imageId'];
    public $incrementing = false;
    protected $primaryKey = null;
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'imageId');
    }
}
