<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 123,
        ]);

        DB::table('users')->insert([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => 123,
        ]);

        DB::table('users')->insert([
            'name' => 'Bob Smith',
            'email' => 'bob@example.com',
            'password' => 123,
        ]);

        DB::table('users')->insert([
            'name' => 'Alice Johnson',
            'email' => 'alice@example.com',
            'password' => 123,
        ]);

        DB::table('users')->insert([
            'name' => 'Charlie Brown',
            'email' => 'charlie@example.com',
            'password' => 123,
        ]);
    }
}
