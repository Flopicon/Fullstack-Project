<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products =
        [
            [
                'category_id'   => 1,
                'name'          => 'Skin 1004 Madagascar Centella Ampoule',
                'description'   => 'Soothing and calming facial ampoule with centella asiatica extract.',
                'price'         => 18.50,
                'stock'         => 45,
                'product_image' => 'skin1004.jpg',
                'skin_type'     => 'All Skin Type',
            ],
            [
                'category_id'   => 1,
                'name'          => 'Anua Heartleaf 77 Soothing Toner',
                'description'   => 'Hydrating toner formulated with heartleaf extract to calm irritated skin.',
                'price'         => 20.00,
                'stock'         => 30,
                'product_image' => 'anua_toner.jpg',
                'skin_type'     => 'Sensitive Skin',
            ],
            [
                'category_id'   => 1,
                'name'          => 'Cosrx Advanced Snail 96 Mucin Power Essence',
                'description'   => 'Nourishing essence that protects skin from moisture loss and improves elasticity.',
                'price'         => 21.00,
                'stock'         => 50,
                'product_image' => 'cosrx_snail.jpg',
                'skin_type'     => 'Dry Skin',
            ],
            [
                'category_id'   => 1,
                'name'          => 'Beauty of Joseon Relief Sun Rice + Probiotics',
                'description'   => 'Lightweight and creamy organic sunscreen that provides comfortable sun protection.',
                'price'         => 18.00,
                'stock'         => 25,
                'product_image' => 'boj_sunscreen.jpg',
                'skin_type'     => 'Combination Skin',
            ],
            [
                'category_id'   => 2,
                'name'          => 'Laneige Lip Sleeping Mask',
                'description'   => 'Softens lips overnight by gently melting dead skin cells.',
                'price'         => 24.00,
                'stock'         => 40,
                'product_image' => 'laneige_mask.jpg',
                'skin_type'     => 'All Skin Type',
            ],
            [
                'category_id'   => 2,
                'name'          => 'Isntree Hyaluronic Acid Watery Sun Gel',
                'description'   => 'Moisturizing sunscreen infused with 8 types of hyaluronic acid.',
                'price'         => 22.00,
                'stock'         => 35,
                'product_image' => 'isntree_sun.jpg',
                'skin_type'     => 'Dry Skin',
            ],
            [
                'category_id'   => 2,
                'name'          => 'Round Lab 107 Dokdo Toner',
                'description'   => 'Fresh water toner that clears dead skin cells for smooth complexion.',
                'price'         => 19.50,
                'stock'         => 60,
                'product_image' => 'roundlab_toner.jpg',
                'skin_type'     => 'Sensitive Skin',
            ],
            [
                'category_id'   => 3,
                'name'          => 'Some By Mi AHA BHA PHA 30 Days Miracle Toner',
                'description'   => 'Exfoliating toner designed to clear acne and blemishes.',
                'price'         => 23.00,
                'stock'         => 20,
                'product_image' => 'somebymi_toner.jpg',
                'skin_type'     => 'Oily Skin',
            ],
            [
                'category_id'   => 3,
                'name'          => 'Torriden Dive-In Low Molecular Hyaluronic Acid Serum',
                'description'   => 'Deeply hydrating serum that absorbs quickly without stickiness.',
                'price'         => 19.00,
                'stock'         => 55,
                'product_image' => 'torriden_serum.jpg',
                'skin_type'     => 'Dehydrated Skin',
            ],
            [
                'category_id'   => 3,
                'name'          => 'COSRX Low Good Morning Gel Cleanser',
                'description'   => 'Gentle daily cleanser with mild acidic formula for morning cleansing.',
                'price'         => 12.00,
                'stock'         => 70,
                'product_image' => 'cosrx_cleanser.jpg',
                'skin_type'     => 'All Skin Type',
            ],
        ];

        foreach ($products as $product) 
        {
            Product::create($product);
        }
    }
}
