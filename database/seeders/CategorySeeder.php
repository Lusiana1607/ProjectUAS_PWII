<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::firstOrCreate([
            'name' => 'Coffee Shop',
        ]);

        Category::firstOrCreate([
            'name' => 'Salon',
        ]);

        Category::firstOrCreate([
            'name' => 'Rental Alat',
        ]);
    }
}