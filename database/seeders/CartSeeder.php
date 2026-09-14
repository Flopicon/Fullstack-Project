<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cart;


class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carts = [
            [
                'id' => '1',
                'user_id' => '1',
            ],
            [
                'id' => '2',
                'user_id' => '2',
            ],
            [
                'id' => '3',
                'user_id' => '3',
            ],
            [
                'id' => '4',
                'user_id' => '4',
            ],
            [
                'id' => '5',
                'user_id' => '5',
            ],
            [
                'id' => '6',
                'user_id' => '6',
            ],
            [
                'id' => '7',
                'user_id' => '7',
            ],
            [
                'id' => '8',
                'user_id' => '8',
            ],
            [
                'id' => '9',
                'user_id' => '9',
            ],
            [
                'id' => '10',
                'user_id' => '10',
            ],
        ];
        foreach ($carts as $cart) {
            Cart::create($cart);
        }
    }
}
