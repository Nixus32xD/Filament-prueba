<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Motherboards',
            'Processors',
            'Memory',
            'Storage',
            'Power Supplies',
            'Graphics Cards',
            'Peripherals',
            'Software',
            'Accessories',
            'Monitors',
        ];

        foreach ($categories as $categoryName) {
            \App\Models\Category::create(['name' => $categoryName]);
        }
    }
}
