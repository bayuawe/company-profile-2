@extends('layouts.app')

@section('content')
    <main id="content">
        <!-- Listings -->
        <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 py-12 lg:py-24 mx-auto">
            <div class="mb-6 sm:mb-10 max-w-2xl text-center mx-auto">
                <h1 class="font-medium text-black text-3xl sm:text-4xl ">
                    Our Products
                </h1>
            </div>
            <!-- Card Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
                @foreach ($products as $product)
                    <!-- Card -->
                    <div class="group flex flex-col">
                        <div class="relative">
                            <div
                                class="aspect-4/4 overflow-hidden rounded-2xl bg-gray-100 flex items-center justify-center text-gray-500 font-semibold">
                                @if ($product->hasMedia('products'))
                                    <img class="w-full h-full object-cover rounded-2xl"
                                        src="{{ $product->getFirstMediaUrl('products', 'preview') }}"
                                        alt="{{ $product->name }}">
                                @else
                                    No Image
                                @endif
                            </div>

                            <div class="pt-4">
                                <h3 class="font-medium md:text-lg text-black">
                                    {{ $product->name }}
                                </h3>

                                <p class="mt-2 font-semibold text-black">
                                    Rp.{{ number_format($product->price, 2) }}
                                </p>
                            </div>

                            <a class="after:absolute after:inset-0 after:z-1" href="#"></a>
                        </div>

                        <div class="mb-2 mt-4 text-sm">
                            <!-- List -->
                            <div class="flex flex-col">
                                <!-- Item -->
                                <div class="py-3 border-t border-gray-100">
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <span class="font-medium text-black">Tasting Notes:</span>
                                        </div>

                                        <div class="text-end">
                                            <span class="text-black">Hazelnut, Grape, Milk Chocolate</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Item -->

                                <!-- Item -->
                                <div class="py-3 border-t border-gray-100">
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <span class="font-medium text-black">Origin:</span>
                                        </div>

                                        <div class="flex justify-end">
                                            <span class="text-black">Brazil</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Item -->

                                <!-- Item -->
                                <div class="py-3 border-t border-gray-100">
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <span class="font-medium text-black">Region:</span>
                                        </div>

                                        <div class="text-end">
                                            <span class="text-black">San Paulo</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Item -->
                            </div>
                            <!-- End List -->
                        </div>

                        <div class="mt-auto">
                            <a class="py-2 px-3 w-full inline-flex justify-center items-center gap-x-2 text-sm font-medium text-nowrap rounded-xl border border-transparent bg-yellow-400 text-black hover:bg-yellow-500 focus:outline-hidden focus:bg-yellow-500 transition disabled:opacity-50 disabled:pointer-events-none"
                                href="{{ route('front.products.detail', $product->slug) }}">
                                See Details
                            </a>
                        </div>
                    </div>
                    <!-- End Card -->
                @endforeach
            </div>

            <div class="flex flex-row justify-center mt-8">
                <!-- Pagination -->
                <nav class="flex items-center gap-x-1" aria-label="Pagination">
                    <!-- Previous Page -->
                    @if ($products->onFirstPage())
                        <button type="button"
                            class="min-h-9.5 min-w-9.5 py-2 px-2.5 inline-flex justify-center items-center gap-x-1.5 text-sm rounded-lg text-yellow-500 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none disabled"
                            aria-label="Previous" disabled="">
                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m15 18-6-6 6-6"></path>
                            </svg>
                            <span>Previous</span>
                        </button>
                    @else
                        <a href="{{ $products->previousPageUrl() }}"
                            class="min-h-9.5 min-w-9.5 py-2 px-2.5 inline-flex justify-center items-center gap-x-1.5 text-sm rounded-lg text-yellow-500 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                            aria-label="Previous" disabled="">
                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m15 18-6-6 6-6"></path>
                            </svg>
                            <span>Previous</span>
                        </a>
                    @endif

                    <!-- Page Number -->
                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <div class="flex items-center gap-x-1">
                            @if ($page == $products->currentPage())
                                <button type="button"
                                    class="min-h-9.5 min-w-9.5 flex justify-center items-center bg-yellow-500 text-white py-2 px-3 text-sm rounded-lg focus:outline-hidden disabled:opacity-50 disabled:pointer-events-none active"
                                    aria-current="page">{{ $page }}</button>
                            @else
                                <a href="{{ $url }}"
                                    class="min-h-9.5 min-w-9.5 flex justify-center items-center bg-gray-100 text-yellow-500 py-2 px-3 text-sm rounded-lg hover:bg-gray-300 focus:outline-hidden disabled:opacity-50 disabled:pointer-events-none">
                                    {{ $page }}
                                </a>
                            @endif
                        </div>
                    @endforeach

                    <!-- Next Page -->
                    @if ($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}"
                            class="min-h-9.5 min-w-9.5 py-2 px-2.5 inline-flex justify-center items-center gap-x-1.5 text-sm rounded-lg text-yellow-500 hover:bg-gray-100 focus:outline-hidden"
                            aria-label="Next">
                            <span>Next</span>
                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>
                        </a>
                    @else
                        <button type="button"
                            class="min-h-9.5 min-w-9.5 py-2 px-2.5 inline-flex justify-center items-center gap-x-1.5 text-sm rounded-lg text-gray-400 bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                            aria-label="Next" disabled>
                            <span>Next</span>
                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>
                        </button>
                    @endif
                </nav>
                <!-- End Pagination -->
            </div>
            <!-- End Card Grid -->
        </div>
        <!-- End Listings -->
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
