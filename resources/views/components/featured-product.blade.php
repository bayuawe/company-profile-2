<div class="py-6 md:py-12 max-w-2xl text-center mx-auto">
    <h1 class="font-medium text-black text-3xl sm:text-4xl ">
        Featured Products
    </h1>
</div>

<!-- Card Grid -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
    <!-- Card -->
    @foreach ($featuredProducts as $product)
        <div class="group flex flex-col relative">
            <div class="relative">
                <div
                    class="aspect-4/4 overflow-hidden rounded-2xl bg-gray-100 flex items-center justify-center text-gray-500 font-semibold relative">
                    @if ($product->hasMedia('products'))
                        <img class="w-full h-full object-cover rounded-2xl"
                            src="{{ $product->getFirstMediaUrl('products') }}" alt="{{ $product->name }}">

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

                <a href="{{ route('front.products.detail', $product->slug) }}" class="absolute inset-0 z-10"></a>
            </div>
        </div>
    @endforeach
    <!-- End Card -->
</div>
<!-- End Card Grid -->

<div class="mt-10 lg:mt-20 text-center">
    <a class="relative inline-block font-medium md:text-lg text-black before:absolute before:bottom-0.5 before:start-0 before:-z-1 before:w-full before:h-1 before:bg-yellow-400 hover:before:bg-black focus:outline-hidden focus:before:bg-black   "
        href="{{ route('front.products') }}">
        View all Products
    </a>
</div>
