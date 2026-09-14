<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'id',
        'user_id',
        'address_id',
        'total_amount',
        'ordered_at',
    ];
    public function payments(){
        return $this->belongsTo(Payment::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function addresses(){
        return $this->belongsTo(Address::class);
    }
    public function order_items(){
        return $this->hasmany(OrderItem::class);
    }
}
