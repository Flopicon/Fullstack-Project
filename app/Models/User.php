<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'role',
    ];
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'users';

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function orders(){
        return $this->hasmany(Order::class);
    }
    public function carts(){
        return $this->belongsTo(Cart::class);
    }
    public function addresses(){
        return $this->hasMany(Address::class);
    }
}