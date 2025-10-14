<div data-hs-carousel='{
    "loadingClasses": "opacity-0",
    "isAutoPlay": true,
    "interval": 5000,
    "dotsItemClasses": "hs-carousel-active:bg-white hs-carousel-active:border-white size-3 border border-gray-400 rounded-full cursor-pointer"
  }'
    class="relative rounded-2xl overflow-hidden">

    {{-- KONTEN UTAMA DIBUNGKUS DALAM CONTAINER RASIO ASPEK --}}
    <div class="relative w-full pb-[56.25%]">
        <div class="hs-carousel absolute inset-0 overflow-hidden w-full h-full rounded-2xl">
            <div
                class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">

                <div class="hs-carousel-slide relative w-full flex items-end bg-cover bg-center bg-no-repeat"
                    style="background-image: url('https://images.unsplash.com/photo-1462917882517-e150004895fa?q=80&w=1920&auto=format&fit=crop');">
                    <div class="p-5 md:p-10 w-2/3 md:max-w-lg">
                        <h1 class="text-xl md:text-3xl lg:text-5xl text-white">
                            Bringing Art to everything
                        </h1>
                    </div>
                </div>

                <div class="hs-carousel-slide relative w-full flex items-end bg-cover bg-center bg-no-repeat"
                    style="background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1920&auto=format&fit=crop');">
                    <div class="p-5 md:p-10 w-2/3 md:max-w-lg">
                        <h1 class="text-xl md:text-3xl lg:text-5xl text-white">
                            Inspire through Creativity
                        </h1>
                    </div>
                </div>

                <div class="hs-carousel-slide relative w-full flex items-end bg-cover bg-center bg-no-repeat"
                    style="background-image: url('https://images.unsplash.com/photo-1529101091764-c3526daf38fe?q=80&w=1920&auto=format&fit=crop');">
                    <div class="p-5 md:p-10 w-2/3 md:max-w-lg">
                        <h1 class="text-xl md:text-3xl lg:text-5xl text-white">
                            Design that speaks
                        </h1>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- AKHIR KONTEN UTAMA --}}

    <button type="button"
        class="hs-carousel-prev absolute inset-y-0 start-0 inline-flex justify-center items-center w-12 text-white bg-black/20 hover:bg-black/40 focus:outline-hidden rounded-s-lg">
        <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path d="m15 18-6-6 6-6"></path>
        </svg>
    </button>

    <button type="button"
        class="hs-carousel-next absolute inset-y-0 end-0 inline-flex justify-center items-center w-12 text-white bg-black/20 hover:bg-black/40 focus:outline-hidden rounded-e-lg">
        <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path d="m9 18 6-6-6-6"></path>
        </svg>
    </button>

    <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2"></div>
</div>
