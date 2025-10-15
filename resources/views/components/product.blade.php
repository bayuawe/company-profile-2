<div class="py-6 md:py-12 max-w-2xl text-center mx-auto">
    <h1 class="font-medium text-black text-3xl sm:text-4xl ">
        Featured Products
    </h1>
</div>

<!-- Card Grid -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
    <!-- Card -->
    @foreach ($featuredProducts as $product)
        <div class="group flex flex-col">
            <div class="relative">
                @if ($product->hasMedia('products'))
                    <div class="aspect-4/4 overflow-hidden rounded-2xl">
                        <img class="size-full object-cover rounded-2xl" src="{{ $product->image_url }}"
                            alt="Product Image">
                    </div>
                @else
                    <div class="aspect-4/4 overflow-hidden rounded-2xl flex items-center justify-center bg-gray-200">
                        <span class="text-gray-500 text-sm">No Image</span>
                    </div>
                @endif

                <div class="pt-4">
                    <h3 class="font-medium md:text-lg text-black ">
                        {{ $product->name }}
                    </h3>

                    <p class="mt-2 font-semibold text-black ">
                        {{ $product->price }}
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
                                <span class="font-medium text-black ">Tasting Notes:</span>
                            </div>

                            <div class="text-end">
                                <span class="text-black ">Hazelnut, Grape, Milk Chocolate</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Item -->

                    <!-- Item -->
                    <div class="py-3 border-t border-gray-200">
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <span class="font-medium text-black ">Origin:</span>
                            </div>

                            <div class="flex justify-end">
                                <span class="text-black ">Brazil</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Item -->

                    <!-- Item -->
                    <div class="py-3 border-t border-gray-200">
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <span class="font-medium text-black ">Region:</span>
                            </div>

                            <div class="text-end">
                                <span class="text-black ">San Paulo</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Item -->
                </div>
                <!-- End List -->
            </div>

            <div class="mt-auto">
                <a class="py-2 px-3 w-full inline-flex justify-center items-center gap-x-2 text-sm font-medium text-nowrap rounded-xl border border-transparent bg-yellow-400 text-black hover:bg-yellow-500 focus:outline-hidden focus:bg-yellow-500 transition disabled:opacity-50 disabled:pointer-events-none"
                    href="#">
                    Buy now
                </a>
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
