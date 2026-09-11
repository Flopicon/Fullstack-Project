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
}
