<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payments = [

            [
                'id'             => 1,
                'payment_method' => 'ABA',
                'payment_status' => 'paid',
                'total_amount'   => 25.00,
                'paid_at'        => now(),
                'order_id'       => 1,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

            [
                'id'             => 2,
                'payment_method' => 'Credit Card',
                'payment_status' => 'paid',
                'total_amount'   => 32.50,
                'paid_at'        => now(),
                'order_id'       => 2,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

            [
                'id'             => 3,
                'payment_method' => 'Cash on Delivery',
                'payment_status' => 'pending',
                'total_amount'   => 18.00,
                'paid_at'        => null,
                'order_id'       => 3,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

            [
                'id'             => 4,
                'payment_method' => 'ABA',
                'payment_status' => 'paid',
                'total_amount'   => 45.00,
                'paid_at'        => now(),
                'order_id'       => 4,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

            [
                'id'             => 5,
                'payment_method' => 'Credit Card',
                'payment_status' => 'paid',
                'total_amount'   => 27.50,
                'paid_at'        => now(),
                'order_id'       => 5,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

            [
                'id'             => 6,
                'payment_method' => 'Cash on Delivery',
                'payment_status' => 'pending',
                'total_amount'   => 21.00,
                'paid_at'        => null,
                'order_id'       => 6,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

            [
                'id'             => 7,
                'payment_method' => 'ABA',
                'payment_status' => 'paid',
                'total_amount'   => 38.00,
                'paid_at'        => now(),
                'order_id'       => 7,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

            [
                'id'             => 8,
                'payment_method' => 'Credit Card',
                'payment_status' => 'failed',
                'total_amount'   => 50.00,
                'paid_at'        => null,
                'order_id'       => 8,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

            [
                'id'             => 9,
                'payment_method' => 'ABA',
                'payment_status' => 'paid',
                'total_amount'   => 29.00,
                'paid_at'        => now(),
                'order_id'       => 9,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

            [
                'id'             => 10,
                'payment_method' => 'Cash on Delivery',
                'payment_status' => 'pending',
                'total_amount'   => 15.00,
                'paid_at'        => null,
                'order_id'       => 10,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

        ];
        foreach ($payments as $payment) {

            Payment::create($payment);
        }
    }
}
