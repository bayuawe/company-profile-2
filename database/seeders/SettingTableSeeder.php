<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'id' => 1,
            'site_title' => 'Sari Pasundan',
            'site_description' => 'Oleh-oleh khas Jawa Barat, menghadirkan aneka camilan tradisional dan modern, dari kue basah, kue kering, hingga jajanan unik, semuanya dibuat dengan bahan berkualitas dan cita rasa autentik Jawa Barat.',
            'meta_description' => 'Temukan oleh-oleh khas Jawa Barat, dari kue tradisional hingga camilan modern, dengan rasa autentik dan bahan berkualitas, cocok untuk hadiah atau dinikmati sendiri.',
            'meta_keywords' => 'oleh-oleh Jawa Barat, kue khas Jawa Barat, camilan tradisional, kue modern, jajanan autentik, oleh-oleh makanan, kue lumer, snack Jawa Barat, hadiah khas Jawa Barat, kuliner Jawa Barat',
            'hero_title' => 'Oleh-Oleh Khas Jawa Barat, Lumer dan Autentik',
            'hero_subtitle' => 'Nikmati camilan tradisional dan modern dengan rasa autentik Jawa Barat, sempurna untuk oleh-oleh atau teman santai Anda',
            'about_content' => '<p>Restoran Nusantara hadir sejak tahun 2018 dengan komitmen untuk melestarikan cita rasa autentik menyajikan oleh-oleh khas Jawa Barat dengan kualitas terbaik. Kami menawarkan beragam kue tradisional dan modern yang lezat, lumer di mulut, dan cocok untuk hadiah maupun dinikmati sendiri. Komitmen kami adalah menjaga cita rasa autentik Jawa Barat di setiap produk.</p>
<p>Kunjungi kami dan nikmati pengalaman yang tak terlupakan.</p>',
            'contact_address' => 'Jl. Paus No.505, Marpoyan Damai, Pekanbaru, Riau 28292',
            'contact_email' => 'saripasundan@gmail.com',
            'contact_phone' => '(021) 555-7890',
            'social_facebook' => 'https://facebook.com/saripasundan',
            'social_tiktok' => 'https://twitter.com/saripasundan',
            'social_instagram' => 'https://instagram.com/saripasundan',
        ]);
    }
}
