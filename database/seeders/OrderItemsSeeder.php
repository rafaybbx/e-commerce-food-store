<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrderItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_items')->insert([
            'order_id' => 1, // Assuming an order with ID 1 exists
            'user_id' => 1, // Assuming a user with ID 1 exists
            'product_id' => 1, // Assuming a product with ID 1 exists
            'quantity' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('order_items')->insert([
            'order_id' => 1, // Assuming an order with ID 1 exists
            'user_id' => 2, // Assuming a user with ID 2 exists
            'product_id' => 2, // Assuming a product with ID 2 exists
            'quantity' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('order_items')->insert([
            'order_id' => 2, // Assuming an order with ID 2 exists
            'user_id' => 1, // Assuming a user with ID 1 exists
            'product_id' => 3, // Assuming a product with ID 3 exists
            'quantity' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('order_items')->insert([
            'order_id' => 2, // Assuming an order with ID 2 exists
            'user_id' => 2, // Assuming a user with ID 2 exists
            'product_id' => 4, // Assuming a product with ID 4 exists
            'quantity' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
