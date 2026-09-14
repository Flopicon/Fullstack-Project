<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = 
    [
        'cart_id',
        'product_id',
        'quantity',
    ];

    
    // A cart item belongs to a specific cart
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    // A cart item references a product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
