<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
    use HasFactory;
    protected $fillable = ['username', 'email', 'password', 'firstName', 'lastName', 'street', 'barangay', 'city', 'postalCode'];
    protected $primaryKey = 'customersId';
    protected $hidden = ['password'];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'customersId');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customersId');
    }
}
