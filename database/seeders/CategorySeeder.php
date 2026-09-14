<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [

            [
                'id'          => 1,
                'name'        => 'Cleanser',
                'description' => 'Facial cleansers for removing dirt, oil, and impurities.',
            ],

            [
                'id'          => 2,
                'name'        => 'Toner',
                'description' => 'Toners that help refresh and prepare the skin.',
            ],

            [
                'id'          => 3,
                'name'        => 'Serum',
                'description' => 'Concentrated skincare products for specific skin concerns.',
            ],

            [
                'id'          => 4,
                'name'        => 'Moisturizer',
                'description' => 'Moisturizers that help keep the skin hydrated and soft.',
            ],

            [
                'id'          => 5,
                'name'        => 'Sunscreen',
                'description' => 'Sunscreens that help protect the skin from UV rays.',
            ],

            [
                'id'          => 6,
                'name'        => 'Face Mask',
                'description' => 'Face masks designed to provide additional skincare benefits.',
            ],

            [
                'id'          => 7,
                'name'        => 'Eye Care',
                'description' => 'Products designed specifically for the delicate skin around the eyes.',
            ],

            [
                'id'          => 8,
                'name'        => 'Lip Care',
                'description' => 'Products that help keep lips moisturized and protected.',
            ],

            [
                'id'          => 9,
                'name'        => 'Exfoliator',
                'description' => 'Products that help remove dead skin cells and smooth the skin.',
            ],

            [
                'id'          => 10,
                'name'        => 'Acne Care',
                'description' => 'Skincare products designed to help manage acne-prone skin.',
            ],

        ];
        foreach ($categories as $category) {

            Category::create($category);
        }
    }
}
