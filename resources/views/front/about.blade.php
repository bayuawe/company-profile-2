@extends('layouts.app')

@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content">

        <!-- Timeline -->
        <div class="container py-16">
            <div class="pb-4">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-800">
                    Kilas Balik Perjalanan Kami
                </h2>
                <p class="mt-3 text-gray-800 text-justify leading-relaxed">
                    Sari Pasundan lahir dari semangat untuk memperkenalkan Kue Balok sebagai makanan khas Jawa Barat ke
                    seluruh Indonesia.
                    Berawal dari satu gerai kecil, kami terus berkembang dan menghadirkan cita rasa autentik yang disukai
                    banyak orang.
                </p>
                <p class="mt-3 text-gray-800 text-justify leading-relaxed">
                    Sejak berdiri pada 3 November 2018 di bawah naungan CV. Sari Pasundan Berkah, kami berkomitmen menjaga
                    kualitas rasa
                    dan bahan baku. Tagline “Lembut, Lumer, Coklat Asli” menjadi identitas produk kami yang telah terdaftar
                    di HAKI.
                </p>
                <p class="mt-3 text-gray-800 text-justify leading-relaxed">
                    Kami percaya produk lokal berkualitas harus mudah diakses siapa pun. Dengan visi menghadirkan Kue Balok
                    terbaik
                    dengan harga terjangkau, Sari Pasundan terus memperluas jangkauan dan jaringan penjualan ke berbagai
                    daerah di Indonesia.
                </p>
            </div>

            <!-- Item -->
            <div class="group relative flex gap-x-5">
                <!-- Icon -->
                <div
                    class="relative group-last:after:hidden after:absolute after:top-8 after:bottom-2 after:start-3 after:w-px after:-translate-x-[0.5px] after:bg-gray-200">
                    <div
                        class="relative z-10 flex items-center justify-center h-10 w-10 rounded overflow-hidden bg-white">
                        @if ($settings->hasMedia('site_logo'))
                            <img src="{{ $settings->getFirstMediaUrl('site_logo') }}" alt="Logo"
                                class="h-full w-full object-contain">
                        @else
                            <div
                                class="flex items-center justify-center h-full w-full bg-gray-300 text-gray-700 text-xs font-semibold">
                                LOGO
                            </div>
                        @endif
                    </div>
                </div>
                <!-- End Icon -->

                <!-- Right Content -->
                <div class="grow pb-8 group-last:pb-0">
                    <h3 class="mb-1 text-xs text-gray-600">
                        2018
                    </h3>

                    <p class="font-semibold text-sm text-gray-800">
                        Outlet pertama kami dibuka di Samarinda, Kalimantan Timur pada 3 November 2018.
                    </p>

                    <p class="mt-1 text-sm text-gray-600">
                        Kami memulai perjalanan dengan satu gerai kecil yang menyajikan Kue Balok khas Jawa Barat.
                    </p>
                </div>
                <!-- End Right Content -->
            </div>
            <!-- End Item -->

            <!-- Item -->
            <div class="group relative flex gap-x-5">
                <!-- Icon -->
                <div
                    class="relative group-last:after:hidden after:absolute after:top-8 after:bottom-2 after:start-3 after:w-px after:-translate-x-[0.5px] after:bg-gray-200">
                    <div
                        class="relative z-10 flex items-center justify-center h-10 w-10 rounded overflow-hidden bg-white">
                        @if ($settings->hasMedia('site_logo'))
                            <img src="{{ $settings->getFirstMediaUrl('site_logo') }}" alt="Logo"
                                class="h-full w-full object-contain">
                        @else
                            <div
                                class="flex items-center justify-center h-full w-full bg-gray-300 text-gray-700 text-xs font-semibold">
                                LOGO
                            </div>
                        @endif
                    </div>
                </div>
                <!-- End Icon -->

                <!-- Right Content -->
                <div class="grow pb-8 group-last:pb-0">
                    <h3 class="mb-1 text-xs text-gray-600">
                        2019
                    </h3>

                    <p class="font-semibold text-sm text-gray-800">
                        Kami memperkenalkan varian rasa baru seperti Kue Balok Cokelat Pisang.
                    </p>

                    <p class="mt-1 text-sm text-gray-600">
                        Inovasi produk kami berlanjut dengan penambahan varian rasa yang menggugah selera, menjadikan
                        Kue Balok lebih menarik bagi berbagai kalangan.
                    </p>
                </div>
                <!-- End Right Content -->
            </div>
            <!-- End Item -->

            <!-- Item -->
            <div class="group relative flex gap-x-5">
                <!-- Icon -->
                <div
                    class="relative group-last:after:hidden after:absolute after:top-8 after:bottom-2 after:start-3 after:w-px after:-translate-x-[0.5px] after:bg-gray-200">
                    <div
                        class="relative z-10 flex items-center justify-center h-10 w-10 rounded overflow-hidden bg-white">
                        @if ($settings->hasMedia('site_logo'))
                            <img src="{{ $settings->getFirstMediaUrl('site_logo') }}" alt="Logo"
                                class="h-full w-full object-contain">
                        @else
                            <div
                                class="flex items-center justify-center h-full w-full bg-gray-300 text-gray-700 text-xs font-semibold">
                                LOGO
                            </div>
                        @endif
                    </div>
                </div>
                <!-- End Icon -->

                <!-- Right Content -->
                <div class="grow pb-8 group-last:pb-0">
                    <h3 class="mb-1 text-xs text-gray-600">
                        2019
                    </h3>

                    <p class="font-semibold text-sm text-gray-800">
                        Dibuka cabang kedua di Pekanbaru, Riau pada 17 Juni 2019.
                    </p>

                    <p class="mt-1 text-sm text-gray-600">
                        Ekspansi kami berlanjut dengan pembukaan cabang kedua di Pekanbaru, memperluas jangkauan kami ke
                        wilayah Sumatera.
                    </p>
                </div>
                <!-- End Right Content -->
            </div>
            <!-- End Item -->

            <!-- Item -->
            <div class="group relative flex gap-x-5">
                <!-- Icon -->
                <div
                    class="relative group-last:after:hidden after:absolute after:top-8 after:bottom-2 after:start-3 after:w-px after:-translate-x-[0.5px] after:bg-gray-200">
                    <div
                        class="relative z-10 flex items-center justify-center h-10 w-10 rounded overflow-hidden bg-white">
                        @if ($settings->hasMedia('site_logo'))
                            <img src="{{ $settings->getFirstMediaUrl('site_logo') }}" alt="Logo"
                                class="h-full w-full object-contain">
                        @else
                            <div
                                class="flex items-center justify-center h-full w-full bg-gray-300 text-gray-700 text-xs font-semibold">
                                LOGO
                            </div>
                        @endif
                    </div>
                </div>
                <!-- End Icon -->

                <!-- Right Content -->
                <div class="grow pb-8 group-last:pb-0">
                    <h3 class="mb-1 text-xs text-gray-600">
                        2021
                    </h3>

                    <p class="font-semibold text-sm text-gray-800">
                        Dibuka cabang ketiga di Panyabungan, Sumatera Utara pada 5 Mei 2021.
                    </p>

                    <p class="mt-1 text-sm text-gray-600">
                        Ekspansi kami berlanjut dengan pembukaan cabang ketiga di Panyabungan, memperluas jangkauan kami ke
                        wilayah Sumatera Utara.
                    </p>
                </div>
                <!-- End Right Content -->
            </div>
            <!-- End Item -->
        </div>
        <!-- End Timeline -->


        {{-- Visi --}}
        <div class="grid gap-12">
            <div>
                <h2 class="text-3xl text-gray-800 font-bold lg:text-4xl">
                    Visi Kami
                </h2>
                <p class="mt-3 text-gray-800">
                    Kami ingin menjadi brand Kue Balok nasional yang dikenal luas, dipercaya konsumen, dan selalu
                    menghadirkan rasa terbaik. Kami fokus menjaga kualitas, memperluas jangkauan, serta terus berinovasi
                    agar produk kami dapat dinikmati oleh semua kalangan.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-6 lg:gap-12">
                <div class="space-y-6 lg:space-y-10">
                    <!-- Icon Block -->
                    <div class="flex gap-x-5 sm:gap-x-8">
                        <svg class="shrink-0 mt-2 size-8 text-yellow-500" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect width="18" height="10" x="3" y="11" rx="2" />
                            <circle cx="12" cy="5" r="2" />
                            <path d="M12 7v4" />
                            <line x1="8" x2="8" y1="16" y2="16" />
                            <line x1="16" x2="16" y1="16" y2="16" />
                        </svg>
                        <div class="grow">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                                Kualitas Terjaga
                            </h3>
                            <p class="mt-1 text-gray-600">
                                Kami memastikan setiap produk dibuat dengan bahan pilihan dan proses produksi yang
                                konsisten.
                            </p>
                        </div>
                    </div>
                    <!-- End Icon Block -->

                    <!-- Icon Block -->
                    <div class="flex gap-x-5 sm:gap-x-8">
                        <svg class="shrink-0 mt-2 size-8 text-yellow-500" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m7.5 4.27 9 5.15" />
                            <path
                                d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z" />
                            <path d="m3.3 7 8.7 5 8.7-5" />
                            <path d="M12 22V12" />
                        </svg>
                        <div class="grow">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                                Harga Terjangkau
                            </h3>
                            <p class="mt-1 text-gray-600">
                                Kami menjaga agar produk tetap ramah di kantong tanpa mengurangi kualitas.
                            </p>
                        </div>
                    </div>
                    <!-- End Icon Block -->

                    <!-- Icon Block -->
                    <div class="flex gap-x-5 sm:gap-x-8">
                        <svg class="shrink-0 mt-2 size-8 text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
                        </svg>
                        <div class="grow">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                                Akses Mudah
                            </h3>
                            <p class="mt-1 text-gray-600">
                                Kami memperluas jaringan distribusi agar produk mudah ditemukan di berbagai daerah.
                            </p>
                        </div>
                    </div>
                    <!-- End Icon Block -->
                </div>
                <!-- End Col -->

                <div class="space-y-6 lg:space-y-10">
                    <!-- Icon Block -->
                    <div class="flex gap-x-5 sm:gap-x-8">
                        <svg class="shrink-0 mt-2 size-8 text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6" />
                            <path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18" />
                            <path d="M4 22h16" />
                            <path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22" />
                            <path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22" />
                            <path d="M18 2H6v7a6 6 0 0 0 12 0V2Z" />
                        </svg>
                        <div class="grow">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                                Inovasi Rasa dan Produk
                            </h3>
                            <p class="mt-1 text-gray-600">
                                Kami mengembangkan varian rasa dan kemasan untuk memenuhi selera pasar.
                            </p>
                        </div>
                    </div>
                    <!-- End Icon Block -->

                    <!-- Icon Block -->
                    <div class="flex gap-x-5 sm:gap-x-8">
                        <svg class="shrink-0 mt-2 size-8 text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                        <div class="grow">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                                Pemberdayaan Lokal
                            </h3>
                            <p class="mt-1 text-gray-600">
                                Kami melibatkan tenaga kerja dan bahan baku lokal untuk mendukung ekonomi daerah.
                            </p>
                        </div>
                    </div>
                    <!-- End Icon Block -->

                    <!-- Icon Block -->
                    <div class="flex gap-x-5 sm:gap-x-8">
                        <svg class="shrink-0 mt-2 size-8 text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 10v12" />
                            <path
                                d="M15 5.88 14 10h5.83a2 2 0 0 1 1.92 2.56l-2.33 8A2 2 0 0 1 17.5 22H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2.76a2 2 0 0 0 1.79-1.11L12 2h0a3.13 3.13 0 0 1 3 3.88Z" />
                        </svg>
                        <div class="grow">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                                Citra Brand Nasional
                            </h3>
                            <p class="mt-1 text-gray-600">
                                Kami membangun identitas Sari Pasundan sebagai brand Kue Balok khas Jawa Barat yang dikenal
                                secara nasional.
                            </p>
                        </div>
                    </div>
                    <!-- End Icon Block -->
                </div>
                <!-- End Col -->
            </div>
        </div>


        {{-- Testimonials --}}
        @include('components.testimonial', ['testimonials' => $testimonials])
    </main>
    <!-- ========== END MAIN CONTENT ========== -->



    <!-- JS Implementing Plugins -->

    <!-- JS PLUGINS -->
    <!-- Required plugins -->
    <script src="https://cdn.jsdelivr.net/npm/preline/dist/index.js"></script>

    <!-- JS THIRD PARTY PLUGINS -->
    <!-- Google Analytics. Global site tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-B73TDMXKF5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'G-B73TDMXKF5');
    </script>
    </body>

    </html>
@endsection
