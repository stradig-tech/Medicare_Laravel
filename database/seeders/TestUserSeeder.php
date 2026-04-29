<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class TestUserSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'firstname' => 'Admin',
            'lastname' => '',
            'email' => 'admin@test.com', // Fallback standard email, or we could leave it. Wait, the login uses email! The user said "name : Admin". I'll use admin@test.com as email because the login form requires an email.
            'password' => Hash::make('Admin123'),
            'dob' => '1990-01-01',
            'role' => 'admin',
            'gender' => 'male',
            'phone' => '1234567890',
            'address' => 'Admin Office',
            'nid' => '12345678901234',
        ]);
    }
}

