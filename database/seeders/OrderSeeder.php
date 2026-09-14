<?php

namespace Database\Seeders;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run(): void
{
    $orders = [
        [
            'id' => '1',
            'user_id' => '1',
            'address_id' => '1',
            'total_amount' => '50',
            'ordered_at' => now()
        ],
        [
            'id' => '2',
            'user_id' => '2',
            'address_id' => '2',
            'total_amount' => '75',
            'ordered_at' => now()
        ],
        [
            'id' => '3',
            'user_id' => '3',
            'address_id' => '3',
            'total_amount' => '100',
            'ordered_at' => now()
        ],
        [
            'id' => '4',
            'user_id' => '4',
            'address_id' => '4',
            'total_amount' => '45',
            'ordered_at' => now()
        ],
        [
            'id' => '5',
            'user_id' => '5',
            'address_id' => '5',
            'total_amount' => '120',
            'ordered_at' => now()
        ],
        [
            'id' => '6',
            'user_id' => '6',
            'address_id' => '6',
            'total_amount' => '80',
            'ordered_at' => now()
        ],
        [
            'id' => '7',
            'user_id' => '7',
            'address_id' => '7',
            'total_amount' => '60',
            'ordered_at' => now()
        ],
        [
            'id' => '8',
            'user_id' => '8',
            'address_id' => '8',
            'total_amount' => '150',
            'ordered_at' => now()
        ],
        [
            'id' => '9',
            'user_id' => '9',
            'address_id' => '9',
            'total_amount' => '90',
            'ordered_at' => now()
        ],
        [
            'id' => '10',
            'user_id' => '10',
            'address_id' => '10',
            'total_amount' => '200',
            'ordered_at' => now()
        ],
    ];

    foreach ($orders as $order) {
        Order::create($order);
    }
}

}
