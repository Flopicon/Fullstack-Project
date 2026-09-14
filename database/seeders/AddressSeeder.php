<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addresses = [

            [
                'id'              => 1,
                'recipient_name'  => 'Customer1',
                'phone'           => '08123456789',
                'address_line'    => '123 Main St',
                'city'            => 'pp',
                'province'        => 'pp',
                'postal_code'     => '11111',
                'is_default'      => 1,
                'user_id'         => 1,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],

            [
                'id'              => 2,
                'recipient_name'  => 'Customer2',
                'phone'           => '08234567890',
                'address_line'    => '45 Street 271',
                'city'            => 'pp',
                'province'        => 'pp',
                'postal_code'     => '12150',
                'is_default'      => 1,
                'user_id'         => 2,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],

            [
                'id'              => 3,
                'recipient_name'  => 'Customer3',
                'phone'           => '08345678901',
                'address_line'    => '78 Street 63',
                'city'            => 'pp',
                'province'        => 'pp',
                'postal_code'     => '12302',
                'is_default'      => 1,
                'user_id'         => 3,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],

            [
                'id'              => 4,
                'recipient_name'  => 'Customer4',
                'phone'           => '08456789012',
                'address_line'    => '12 Street 214',
                'city'            => 'pp',
                'province'        => 'pp',
                'postal_code'     => '12000',
                'is_default'      => 1,
                'user_id'         => 4,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],

            [
                'id'              => 5,
                'recipient_name'  => 'Customer5',
                'phone'           => '08567890123',
                'address_line'    => '90 Street 310',
                'city'            => 'pp',
                'province'        => 'pp',
                'postal_code'     => '12101',
                'is_default'      => 1,
                'user_id'         => 5,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],

            [
                'id'              => 6,
                'recipient_name'  => 'Customer6',
                'phone'           => '08678901234',
                'address_line'    => '25 Street 105',
                'city'            => 'pp',
                'province'        => 'pp',
                'postal_code'     => '12000',
                'is_default'      => 1,
                'user_id'         => 6,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],

            [
                'id'              => 7,
                'recipient_name'  => 'Customer7',
                'phone'           => '08789012345',
                'address_line'    => '56 Street 182',
                'city'            => 'pp',
                'province'        => 'pp',
                'postal_code'     => '12200',
                'is_default'      => 1,
                'user_id'         => 7,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],

            [
                'id'              => 8,
                'recipient_name'  => 'Customer8',
                'phone'           => '08890123456',
                'address_line'    => '34 Street 370',
                'city'            => 'pp',
                'province'        => 'pp',
                'postal_code'     => '12310',
                'is_default'      => 1,
                'user_id'         => 8,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],

            [
                'id'              => 9,
                'recipient_name'  => 'Customer9',
                'phone'           => '08901234567',
                'address_line'    => '101 Street 51',
                'city'            => 'pp',
                'province'        => 'pp',
                'postal_code'     => '12000',
                'is_default'      => 1,
                'user_id'         => 9,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],

            [
                'id'              => 10,
                'recipient_name'  => 'Customer10',
                'phone'           => '09012345678',
                'address_line'    => '67 Street 2004',
                'city'            => 'pp',
                'province'        => 'pp',
                'postal_code'     => '12100',
                'is_default'      => 1,
                'user_id'         => 10,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],

        ];
        foreach ($addresses as $address) {
            Address::create($address);
        }
    }
}
