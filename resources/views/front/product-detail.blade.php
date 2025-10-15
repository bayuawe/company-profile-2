@extends('layouts.app')

@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Gambar Produk -->
            <div class="space-y-4">
                <div class="relative aspect-4/4 overflow-hidden rounded-2xl border border-gray-200 shadow-sm">
                    @if ($product->hasMedia('products'))
                        <img src="{{ $product->getFirstMediaUrl('products', 'preview') }}" alt="{{ $product->name }}"
                            class="w-full h-full object-cover rounded-2xl">
                    @else
                        <p class="flex items-center justify-center h-full text-gray-500 font-semibold">No Image</p>
                    @endif

                    @if ($product->featured)
                        <span
                            class="absolute top-3 left-3 inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-yellow-500 text-black">
                            Featured
                        </span>
                    @endif
                </div>

                <!-- Thumbnail jika ada gallery -->
                @if ($product->media && $product->media->count() > 1)
                    <div class="flex gap-3 overflow-x-auto">
                        @foreach ($product->media as $media)
                            <div
                                class="w-20 h-20 rounded-lg overflow-hidden border border-gray-200 cursor-pointer hover:ring-2 hover:ring-yellow-500">
                                <img src="{{ $media->getUrl('preview') }}" class="w-full h-full object-cover">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Detail Produk -->
            <div class="flex flex-col justify-between space-y-6">
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <h1 class="text-2xl font-bold">{{ $product->name }}</h1>
                        <span
                            class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                            {{ $product->category->name }}
                        </span>
                    </div>

                    <p class="text-3xl font-extrabold text-yellow-500 mb-4">
                        Rp.{{ number_format($product->price, 2) }}
                    </p>

                    <p class="text-gray-600 leading-relaxed">
                        {!! Str::limit(strip_tags($product->description), 120, '...') !!}
                    </p>
                </div>

                <div class="space-y-3">
                    <button
                        class="w-full py-3 text-center bg-yellow-500 text-black font-semibold rounded-lg hover:bg-yellow-400 transition">
                        Tambah ke Keranjang
                    </button>
                    <button
                        class="w-full py-3 text-center bg-gray-200 text-gray-800 font-semibold rounded-lg hover:bg-gray-300 transition">
                        Wishlist
                    </button>
                </div>
            </div>
        </div>

        <!-- Tab Deskripsi -->
        <div class="mt-12 border-t pt-8">
            <nav class="flex gap-6 border-b mb-6" aria-label="Tabs" role="tablist">
                <button type="button"
                    class="hs-tab-active:font-semibold hs-tab-active:border-b-2 hs-tab-active:border-yellow-500 py-2 border-transparent text-gray-500 hover:text-black active"
                    id="tab-description" data-hs-tab="#tab-panel-description" aria-controls="tab-panel-description"
                    role="tab">
                    Deskripsi
                </button>
                <button type="button"
                    class="hs-tab-active:font-semibold hs-tab-active:border-b-2 hs-tab-active:border-yellow-500 py-2 border-transparent text-gray-500 hover:text-black"
                    id="tab-shipping" data-hs-tab="#tab-panel-shipping" aria-controls="tab-panel-shipping" role="tab">
                    Pengiriman
                </button>
            </nav>

            <div>
                <div id="tab-panel-description" role="tabpanel" aria-labelledby="tab-description">
                    <div class="prose max-w-none">
                        {!! $product->description !!}
                    </div>
                </div>
                <div id="tab-panel-shipping" class="hidden" role="tabpanel" aria-labelledby="tab-shipping">
                    <p class="text-gray-600">Pengiriman dilakukan 1-2 hari kerja setelah pembayaran.</p>
                </div>
            </div>
        </div>

        <!-- Related products -->
        @if ($relatedProducts->count() > 0)
            <div class="mt-16">
                <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Related Products</h2>
                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 sm:gap-8">
                    @foreach ($relatedProducts as $relatedProduct)
                        <!-- Related Product Card -->
                        <div class="group flex flex-col">
                            <div class="relative">
                                <a href="{{ route('front.products.detail', $relatedProduct->slug) }}"
                                    class="block relative">
                                    <div
                                        class="aspect-4/4 overflow-hidden rounded-2xl bg-gray-100 flex items-center justify-center text-gray-500 font-semibold relative">
                                        @if ($relatedProduct->hasMedia('products'))
                                            <img class="w-full h-full object-cover rounded-2xl"
                                                src="{{ $relatedProduct->getFirstMediaUrl('products', 'preview') }}"
                                                alt="{{ $relatedProduct->name }}">
                                        @else
                                            <p>No Image</p>
                                        @endif

                                        @if ($relatedProduct->featured)
                                            <span
                                                class="absolute top-2 right-2 inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-yellow-500 text-white">
                                                Featured
                                            </span>
                                        @endif

                                        <span
                                            class="absolute bottom-2 left-2 inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-none text-white">
                                            {{ $relatedProduct->category->name }}
                                        </span>
                                    </div>
                                </a>

                                <div class="pt-4">
                                    <a href="{{ route('front.products.detail', $relatedProduct->slug) }}">
                                        <h5 class="text-center tracking-tight text-neutral font-bold text-base sm:text-lg">
                                            {{ $relatedProduct->name }}
                                        </h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Related Product Card -->
                    @endforeach
                </div>
            </div>
        @endif
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
