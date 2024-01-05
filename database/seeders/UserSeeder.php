<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make("admin"),
            "role" => "Admin"
        ]);
        
        User::create([
            "name" => "PS Wikrama 1",
            "email" => "pembimbing@gmail.com",
            "password" => Hash::make("pembimbing"),
            "role" => "Pembimbing Siswa"
        ]);
    }
}
