<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'phone_number' => null,
            'address' => '123 Main Street',
            'password' => Hash::make('password'), 
            // 'confirm_password' => Hash::make('password'), //confirm_password column does does not exist
            'is_admin' => true,
        ]);
    }
}
