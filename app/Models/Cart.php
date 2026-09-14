<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable=[
        'id',
        'user_id',
        ];
        public function cart_items(){
            return $this->hasmany(CartItem::class);
        }
        public function users(){
            return $this->belongsTo(User::class);
        }
}
