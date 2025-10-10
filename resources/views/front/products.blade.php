@extends('layouts.app')

@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content">
        <!-- Listings -->
        <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 py-12 lg:py-24 mx-auto">
            <!-- Card Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
                @foreach ($products as $product)
                    <!-- Card -->
                    <div class="group flex flex-col">
                        <div class="relative">
                            <div
                                class="aspect-4/4 overflow-hidden rounded-2xl bg-gray-200 flex items-center justify-center text-gray-500 font-semibold">
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
                                <div class="py-3 border-t border-gray-200">
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
                                <div class="py-3 border-t border-gray-200">
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
                                <div class="py-3 border-t border-gray-200">
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
