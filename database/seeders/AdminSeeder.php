<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', 'Admin')->first();

        User::firstOrCreate(
            ['email' => 'admin@reservhub.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('admin123'),
                'role_id' => $adminRole->id,
            ]
        );
    }
}