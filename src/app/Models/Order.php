<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;
    protected $fillable = ['customersId', 'totalPrice', 'paymentMethod', 'deliveryAddress', 'purchaseDate'];
    protected $primaryKey = 'orderNumber';

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customersId');
    }
}
