<div class="w-full max-w-7xl shadow-xl rounded-2xl">

    <div data-hs-carousel='{
            "loadingClasses": "opacity-0",
            "isAutoPlay": true,
            "interval": 5000,
            "dotsItemClasses": "hs-carousel-active:bg-white hs-carousel-active:border-white size-3 border border-gray-400 rounded-full cursor-pointer"
        }'
        class="relative rounded-2xl overflow-hidden">

        {{-- KONTEN UTAMA DIBUNGKUS DALAM CONTAINER RASIO ASPEK (padding-top: 31.25% untuk rasio 16:5) --}}
        {{-- Kami menggunakan padding-top: 31.25% (600px / 1920px = 0.3125) untuk menjaga rasio 16:5 --}}
        <div class="relative w-full overflow-hidden" style="padding-top: 31.25%;">
            {{-- Semua elemen anak harus di-absolute-kan agar mengisi ruang yang dibuat oleh padding --}}
            <div class="hs-carousel absolute inset-0 w-full h-full rounded-2xl">
                <div
                    class="hs-carousel-body absolute inset-0 flex flex-nowrap transition-transform duration-700 opacity-0">

                    {{-- SLIDE 1 --}}
                    {{-- h-[300px] dihapus dan diganti dengan h-full, w-full dan diset absolute inset-0 untuk mengisi kontainer --}}
                    <div class="hs-carousel-slide absolute inset-0 w-full bg-cover bg-center bg-no-repeat"
                        style="background-image: url('https://images.unsplash.com/photo-1462917882517-e150004895fa?q=80&w=1920&h=600&auto=format&fit=crop');">
                        {{-- Konten di dalam slide juga harus h-full --}}
                        <div class="p-5 md:p-10 w-full h-full md:max-w-lg flex items-center bg-black/30">
                            <h1 class="text-white text-xl md:text-3xl lg:text-5xl drop-shadow-lg">
                                Bringing Art to everything
                            </h1>
                        </div>
                    </div>

                    {{-- SLIDE 2 --}}
                    <div class="hs-carousel-slide absolute inset-0 w-full bg-cover bg-center bg-no-repeat"
                        style="background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1920&h=600&auto=format&fit=crop');">
                        <div class="p-5 md:p-10 w-full h-full md:max-w-lg flex items-center bg-black/30">
                            <h1 class="text-white text-xl md:text-3xl lg:text-5xl drop-shadow-lg">
                                Inspire through Creativity
                            </h1>
                        </div>
                    </div>

                    {{-- SLIDE 3 --}}
                    <div class="hs-carousel-slide absolute inset-0 w-full bg-cover bg-center bg-no-repeat"
                        style="background-image: url('https://images.unsplash.com/photo-1529101091764-c3526daf38fe?q=80&w=1920&h=600&auto=format&fit=crop');">
                        <div class="p-5 md:p-10 w-full h-full md:max-w-lg flex items-center bg-black/30">
                            <h1 class="text-white text-xl md:text-3xl lg:text-5xl drop-shadow-lg">
                                Design that speaks
                            </h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- AKHIR KONTEN UTAMA RASIO ASPEK --}}

        {{-- Navigasi --}}
        <button type="button"
            class="hs-carousel-prev absolute inset-y-0 start-0 inline-flex justify-center items-center w-12 text-white bg-black/20 hover:bg-black/40 focus:outline-hidden transition duration-300 rounded-s-lg">
            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path d="m15 18-6-6 6-6"></path>
            </svg>
        </button>

        <button type="button"
            class="hs-carousel-next absolute inset-y-0 end-0 inline-flex justify-center items-center w-12 text-white bg-black/20 hover:bg-black/40 focus:outline-hidden transition duration-300 rounded-e-lg">
            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </button>

        <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2"></div>
    </div>
</div>
