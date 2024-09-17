<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'login' => 'admin',
            'password' => Hash::make('adminpassword'),
            'role' => 'admin',
        ]);

        User::create([
            'login' => 'manager',
            'password' => Hash::make('managerpassword'),
            'role' => 'content_manager',
        ]);

        User::create([
            'login' => 'user',
            'password' => Hash::make('userpassword'),
            'role' => 'content_manager',
        ]);
    }
}
