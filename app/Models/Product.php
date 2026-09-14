<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =
    [
        'id',
        'category_id',
        'name',
        'description',
        'price',
        'stock',
        'product_image',
        'skin_type',
        
    ];
    // A product belongs to a category
    public function catefory()
    {
        return $this->belongsTo(Category::class);
    }
    // A product can appear in many cart items
    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
    // A product can appear in many order items
    public function cartItem()
    {
        return $this->hasMany(CartItem::class);
    }
}
