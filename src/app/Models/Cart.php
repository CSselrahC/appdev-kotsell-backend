<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
    use HasFactory;
    protected $fillable = ['customersId', 'productId', 'quantity', 'price'];
    protected $primaryKey = 'cartId';

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customersId');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }
}
