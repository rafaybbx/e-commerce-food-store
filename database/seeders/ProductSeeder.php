<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Apple',
            'img' => 'apple.jpg',
            'quantity_per_kg' => 10,
            'price_per_kg' => 2.50,
        ]);

        DB::table('products')->insert([
            'name' => 'Banana',
            'img' => 'banana.jpg',
            'quantity_per_kg' => 8,
            'price_per_kg' => 1.80,
        ]);

        DB::table('products')->insert([
            'name' => 'Orange',
            'img' => 'orange.jpg',
            'quantity_per_kg' => 12,
            'price_per_kg' => 3.20,
        ]);

        DB::table('products')->insert([
            'name' => 'Grapes',
            'img' => 'grapes.jpg',
            'quantity_per_kg' => 15,
            'price_per_kg' => 4.50,
        ]);

        DB::table('products')->insert([
            'name' => 'Strawberry',
            'img' => 'strawberry.jpg',
            'quantity_per_kg' => 20,
            'price_per_kg' => 5.50,
        ]);
    }
}
