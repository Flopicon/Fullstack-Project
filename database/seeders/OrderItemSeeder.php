<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderItem;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderitems =
            [
                ['order_id' => 1, 'product_id' => 1, 'quantity' => 2, 'price' => 18.50],
                ['order_id' => 1, 'product_id' => 3, 'quantity' => 1, 'price' => 21.00],
                ['order_id' => 2, 'product_id' => 2, 'quantity' => 1, 'price' => 20.00],
                ['order_id' => 2, 'product_id' => 4, 'quantity' => 3, 'price' => 18.00],
                ['order_id' => 3, 'product_id' => 5, 'quantity' => 2, 'price' => 24.00],
                ['order_id' => 3, 'product_id' => 6, 'quantity' => 1, 'price' => 22.00],
                ['order_id' => 4, 'product_id' => 7, 'quantity' => 1, 'price' => 19.50],
                ['order_id' => 4, 'product_id' => 8, 'quantity' => 2, 'price' => 23.00],
                ['order_id' => 5, 'product_id' => 9, 'quantity' => 1, 'price' => 19.00],
                ['order_id' => 5, 'product_id' => 10, 'quantity' => 4, 'price' => 12.00],
            ];
            foreach ($orderitems as $orderitem) 
            {
                OrderItem::create($orderitem);
            }
    }
}
