<div class="w-full max-w-7xl mx-auto shadow-xl rounded-2xl">
    <div data-hs-carousel='{
            "loadingClasses": "opacity-0",
            "isAutoPlay": true,
            "interval": 5000,
            "dotsItemClasses": "hs-carousel-active:bg-white hs-carousel-active:border-white size-3 border border-gray-400 rounded-full cursor-pointer"
        }'
        class="relative rounded-2xl overflow-hidden">

        {{-- Container dengan rasio 16:9 --}}
        <div class="relative w-full overflow-hidden" style="padding-top: 56.25%;">
            {{-- Carousel --}}
            <div class="hs-carousel absolute inset-0 w-full h-full">
                <div class="hs-carousel-body flex transition-transform duration-700 ease-in-out h-full">
                    @foreach ($settings->getMedia('hero_images') as $media)
                        <div class="hs-carousel-slide flex-shrink-0 w-full h-full">
                            <div class="w-full h-full bg-cover bg-center bg-no-repeat rounded-2xl"
                                style="background-image: url('{{ $media->getUrl('preview') }}');">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

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

        {{-- Pagination --}}
        <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2"></div>
    </div>
</div>
