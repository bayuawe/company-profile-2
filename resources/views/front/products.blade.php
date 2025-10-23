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

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 lg:gap-12">

                <!-- Sidebar -->
                <aside class="lg:col-span-1 w-full relative lg:sticky lg:top-4 lg:h-fit lg:self-start">
                    <!-- Search -->
                    <div class="mb-8">
                        <h2 class="text-xl font-bold mb-4 text-neutral">Search Products</h2>
                        <form action="{{ route('front.products') }}" method="get" class="space-y-4">
                            @foreach (request()->except('search') as $key => $value)
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endforeach
                            <div class="max-w-sm space-y-3">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="py-2.5 sm:py-3 px-4 block w-full border-yellow-500 rounded-lg sm:text-sm focus:border-yellow-500 focus:ring-yellow-500 disabled:opacity-50 disabled:pointer-events-none"
                                    placeholder="Search products...">
                            </div>
                            <div class="flex gap-2">
                                <button type="submit"
                                    class="flex-1 bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-400 transition">
                                    Search
                                </button>
                                @if (request('search'))
                                    <a href="{{ route('front.products') }}"
                                        class="flex-1 text-center bg-gray-300 text-black px-4 py-2 rounded hover:bg-gray-200 transition">
                                        Clear
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>

                    <!-- Categories Filter -->
                    <div class="mb-8">
                        <h2 class="text-xl font-bold mb-4 text-warning">Categories</h2>
                        <ul class="space-y-2">
                            <li>
                                <a href="{{ route('front.products') }}"
                                    class="flex justify-between items-center hover:bg-yellow-400 p-2 rounded {{ !request('category') ? 'bg-yellow-500 text-neutral font-bold' : 'text-gray-400' }}">
                                    <span>All Products</span>
                                    <span class="bg-warning text-white px-2 py-1 rounded-full text-sm">
                                        {{ $products->total() }}
                                    </span>
                                </a>
                            </li>
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('front.products', array_merge(request()->except('category'), ['category' => $category->id])) }}"
                                        class="flex justify-between items-center hover:bg-yellow-400 p-2 rounded {{ request('category') == $category->id ? 'bg-yellow-500 text-neutral font-bold' : 'text-gray-400' }}">
                                        <span>{{ $category->name }}</span>
                                        <span class="bg-warning text-white px-2 py-1 rounded-full text-sm">
                                            {{ $category->products_count }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Price Range Filter -->
                    <div class="mb-8">
                        <h2 class="text-xl font-bold mb-4 text-neutral">Price Range</h2>
                        <form action="{{ route('front.products') }}" method="get" class="space-y-4">
                            @foreach (request()->except(['price_min', 'price_max']) as $key => $value)
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endforeach

                            <div>
                                <label class="block text-sm text-gray-400 mb-1">Minimum Price</label>
                                <div class="max-w-sm space-y-3">
                                    <input type="number" name="price_min" value="{{ request('price_min') }}"
                                        class="py-2.5 sm:py-3 px-4 block w-full border-yellow-500 rounded-lg sm:text-sm focus:border-yellow-500 focus:ring-yellow-500 disabled:opacity-50 disabled:pointer-events-none"
                                        placeholder="Minimum Price">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm text-gray-400 mb-1">Maximum Price</label>
                                <div class="max-w-sm space-y-3">
                                    <input type="number" name="price_max" value="{{ request('price_max') }}"
                                        class="py-2.5 sm:py-3 px-4 block w-full border-yellow-500 rounded-lg sm:text-sm focus:border-yellow-500 focus:ring-yellow-500 disabled:opacity-50 disabled:pointer-events-none"
                                        placeholder="Maximum Price">
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <button type="submit"
                                    class="flex-1 bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-400 transition">
                                    Apply Filter
                                </button>

                                <a href="{{ route('front.products') }}"
                                    class="flex-1 text-center bg-gray-300 text-black px-4 py-2 rounded hover:bg-gray-200 transition">
                                    Clear Filter
                                </a>
                            </div>
                        </form>
                    </div>

                </aside>

                <!-- Grid Produk -->
                <div class="lg:col-span-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @if ($products->isEmpty())
                        <div class="col-span-full flex flex-col items-center justify-center text-center py-16">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-20 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                            </svg>
                            <p class="text-gray-500 text-lg font-medium">No products found.</p>
                        </div>
                    @else
                        @foreach ($products as $product)
                            <!-- Card -->
                            <div class="group flex flex-col relative">
                                <div class="relative">
                                    <div
                                        class="aspect-4/4 overflow-hidden rounded-2xl bg-gray-100 flex items-center justify-center text-gray-500 font-semibold relative">
                                        @if ($product->hasMedia('products'))
                                            <img class="w-full h-full object-cover rounded-2xl"
                                                src="{{ $product->getFirstMediaUrl('products') }}"
                                                alt="{{ $product->name }}">

                                            @if ($product->featured)
                                                <span
                                                    class="absolute top-2 right-2 inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-yellow-500 text-white">
                                                    Featured
                                                </span>
                                            @endif

                                            <span
                                                class="absolute bottom-2 left-2 inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium  text-white">
                                                {{ $product->category->name }}
                                            </span>
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

                                    <a href="{{ route('front.products.detail', $product->slug) }}"
                                        class="absolute inset-0 z-10"></a>
                                </div>
                            </div>
                            <!-- End Card -->
                        @endforeach
                    @endif


                </div>

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
                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>
                        </a>
                    @else
                        <button type="button"
                            class="min-h-9.5 min-w-9.5 py-2 px-2.5 inline-flex justify-center items-center gap-x-1.5 text-sm rounded-lg text-gray-400 bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                            aria-label="Next" disabled>
                            <span>Next</span>
                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
