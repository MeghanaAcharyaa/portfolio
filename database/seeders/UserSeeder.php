<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Meghana Acharya',
            'email' => 'admin@meghana.dev',
            'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
        ]);
    }
}
