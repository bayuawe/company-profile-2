<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'author_name' => 'Ahmad Rahman',
                'text' => 'Pelayanan sangat baik dan produk berkualitas tinggi. Sudah beberapa kali order dan selalu puas dengan hasilnya.',
                'rating' => 5.0,
                'time' => now()->subDays(5),
            ],
            [
                'author_name' => 'Siti Nurhaliza',
                'text' => 'Harga terjangkau dengan kualitas premium. Tim support responsif dan membantu. Recommended!',
                'rating' => 5.0,
                'time' => now()->subDays(12),
            ],
            [
                'author_name' => 'Budi Santoso',
                'text' => 'Pengiriman cepat dan packing aman. Produk sesuai dengan deskripsi. Akan order lagi.',
                'rating' => 4.0,
                'time' => now()->subDays(20),
            ],
            [
                'author_name' => 'Maya Sari',
                'text' => 'Desain modern dan fungsional. Customer service sangat ramah dan informatif.',
                'rating' => 5.0,
                'time' => now()->subDays(8),
            ],
            [
                'author_name' => 'Rizki Pratama',
                'text' => 'Kualitas bahan sangat baik. Sudah test beberapa produk dan hasilnya memuaskan.',
                'rating' => 4.0,
                'time' => now()->subDays(15),
            ],
            [
                'author_name' => 'Dewi Lestari',
                'text' => 'Pengalaman belanja yang menyenangkan. Website mudah digunakan dan checkout lancar.',
                'rating' => 5.0,
                'time' => now()->subDays(3),
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
