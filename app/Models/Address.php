<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'id',
        'recipient_name',
        'phone',
        'address_line',
        'city',
        'province',
        'postal_code',
        'is_default',
        'user_id'
    ];
}
