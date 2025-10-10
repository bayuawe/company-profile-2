<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Kue', 'slug' => 'kue', 'image' => null, 'is_active' => true],
            ['name' => 'Snack', 'slug' => 'snack', 'image' => null, 'is_active' => true],
            ['name' => 'Minuman', 'slug' => 'minuman', 'image' => null, 'is_active' => true],
            ['name' => 'Menu Lainnya', 'slug' => 'menu-lainnya', 'image' => null, 'is_active' => true],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']], // cek berdasarkan slug
                $category
            );
        }
    }
}
