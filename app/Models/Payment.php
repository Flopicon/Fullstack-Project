<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'id',
        'payment_method',
        'payment_status',
        'total_amount',
        'paid_at',
        'order_id',
    ];
}
