<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HashPasswords extends Command
{
    protected $signature = 'hash:passwords';

    protected $description = 'Hash existing passwords in the database';

    public function handle()
    {
        $this->info('Hashing passwords...');

        // Specify the table and columns where passwords need to be hashed
        $table = 'users'; // Change this to your actual table name
        $column = 'password'; // Change this to your actual column name

        // Get all records from the specified table
        $records = DB::table($table)->get();

        // Hash each password and update the database
        foreach ($records as $record) {
            $hashedPassword = Hash::make($record->$column);
            DB::table($table)->where('id', $record->id)->update([$column => $hashedPassword]);
        }

        $this->info('Passwords hashed successfully.');
    }
}
