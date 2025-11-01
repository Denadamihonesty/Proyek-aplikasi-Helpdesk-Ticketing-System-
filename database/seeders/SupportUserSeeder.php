<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SupportUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'support@example.com'],
            ['name' => 'IT Support', 'password' => Hash::make('password'), 'role' => 'it_support']
        );
    }
}
