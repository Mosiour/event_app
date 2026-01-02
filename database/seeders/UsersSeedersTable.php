<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeedersTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role' => 'admin',
            'name' => 'App Admin',
            'email' => 'app_admin@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'role' => 'event admin',
            'name' => 'Event Admin',
            'email' => 'event_admin@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'role' => 'user',
            'name' => 'Jamal',
            'email' => 'jamal@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'role' => 'user',
            'name' => 'Kamal',
            'email' => 'kamal@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'role' => 'user',
            'name' => 'Rahim',
            'email' => 'rahim@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
