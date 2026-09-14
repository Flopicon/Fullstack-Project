<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    $users = [
        [
            'id' => 1,
            'name' => 'Jesus',
            'email' => 'jesus9@gmail.com',
            'password' => '12345678',
            'role' => 'admin',
        ],
        [
            'id' => 2,
            'name' => 'Ice Out',
            'email' => 'iceout@gmail.com',
            'password' => '12345678',
            'role' => 'customer',
        ],
        [
            'id' => 3,
            'name' => 'John',
            'email' => 'john@gmail.com',
            'password' => '12345678',
            'role' => 'customer',
        ],
        [
            'id' => 4,
            'name' => 'Sarah',
            'email' => 'sarah@gmail.com',
            'password' => '12345678',
            'role' => 'customer',
        ],
        [
            'id' => 5,
            'name' => 'David',
            'email' => 'david@gmail.com',
            'password' => '12345678',
            'role' => 'customer',
        ],
        [
            'id' => 6,
            'name' => 'Emma',
            'email' => 'emma@gmail.com',
            'password' => '12345678',
            'role' => 'customer',
        ],
        [
            'id' => 7,
            'name' => 'Alex',
            'email' => 'alex@gmail.com',
            'password' => '12345678',
            'role' => 'customer',
        ],
        [
            'id' => 8,
            'name' => 'Lisa',
            'email' => 'lisa@gmail.com',
            'password' => '12345678',
            'role' => 'customer',
        ],
        [
            'id' => 9,
            'name' => 'Michael',
            'email' => 'michael@gmail.com',
            'password' => '12345678',
            'role' => 'customer',
        ],
        [
            'id' => 10,
            'name' => 'Sophia',
            'email' => 'sophia@gmail.com',
            'password' => '12345678',
            'role' => 'customer',
        ],
    ];

    foreach ($users as $user) {
        User::factory()->create($user);
    }
}
}
