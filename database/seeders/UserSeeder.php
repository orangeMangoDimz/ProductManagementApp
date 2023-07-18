<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "username" => "user",
            "Email" => "user@gmail.com",
            "password" => "12345678"
        ]);

        User::create([
            "username" => "user2",
            "Email" => "user2@gmail.com",
            "password" => "12345678"
        ]);
        
        User::create([
            "username" => "user3",
            "Email" => "user3@gmail.com",
            "password" => "12345678"
        ]);

        User::create([
            "username" => "admin",
            "Email" => "admin@gmail.com",
            "password" => "12345678"
        ]);
    }
}
