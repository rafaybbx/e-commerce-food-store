<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            'user_id' => 1, // Assuming a user with ID 1 exists
            'price' => 25.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('orders')->insert([
            'user_id' => 2, // Assuming a user with ID 2 exists
            'price' => 30.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('orders')->insert([
            'user_id' => 3, // Assuming a user with ID 3 exists
            'price' => 40.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('orders')->insert([
            'user_id' => 1, // Assuming a user with ID 1 exists
            'price' => 18.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('orders')->insert([
            'user_id' => 4, // Assuming a user with ID 4 exists
            'price' => 55.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
