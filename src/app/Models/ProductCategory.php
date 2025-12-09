<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model {
    use HasFactory;
    protected $fillable = ['productId', 'categoryId'];
    public $incrementing = false;
    protected $primaryKey = null;
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }
}
