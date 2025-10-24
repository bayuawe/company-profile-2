<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RoleSeeder::class,             // Create roles first
            UserTableSeeder::class,        // Finally create users with roles
            CategoryTableSeeder::class,    // Seed categories
            ProductTableSeeder::class,     // Seed products
            SettingTableSeeder::class, // Seed website settings
            TestimonialTableSeeder::class, // Seed testimonials
        ]);
    }
}
