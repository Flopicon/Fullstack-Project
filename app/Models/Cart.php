<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Cart extends Model
{
    protected $fillable=[
        'id',
        'user_id',
        ];
        public function cart_items(){
            return $this->hasmany(CartItem::class);
        }
        public function user(){
            return $this->belongsTo(User::class);
        }
}
