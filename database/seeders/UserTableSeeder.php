<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $superadmin = User::create([
            'name' => 'Super Admin',
            'fullname' => 'Super Administrator',
            'birthdate' => '1980-01-01',
            'phone' => '+6281234567890',
            'address' => 'Jl. Admin No. 1, Jakarta Pusat',
            'subdistrict' => 'Gambir',
            'district' => 'Jakarta Pusat',
            'city_regency' => 'Jakarta Pusat',
            'province' => 'DKI Jakarta',
            'email' => 'superadmin@mail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $superadmin->assignRole('superadmin');

        $admin = User::create([
            'name' => 'Admin',
            'fullname' => 'Administrator',
            'birthdate' => '1985-05-15',
            'phone' => '+6281234567891',
            'address' => 'Jl. Admin No. 2, Jakarta Selatan',
            'subdistrict' => 'Setiabudi',
            'district' => 'Jakarta Selatan',
            'city_regency' => 'Jakarta Selatan',
            'province' => 'DKI Jakarta',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User',
            'fullname' => 'Regular User',
            'birthdate' => '1990-10-20',
            'phone' => '+6281234567892',
            'address' => 'Jl. User No. 3, Bandung',
            'subdistrict' => 'Coblong',
            'district' => 'Bandung',
            'city_regency' => 'Bandung',
            'province' => 'Jawa Barat',
            'email' => 'user@mail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('user');
    }
}
