<div class="py-6 md:py-12 max-w-2xl text-center mx-auto">
    <h1 class="font-medium text-black text-3xl sm:text-4xl ">
        Categories
    </h1>
</div>

<div
    class="flex gap-4 sm:gap-6 overflow-x-auto snap-x snap-mandatory pb-4 
            sm:grid sm:grid-cols-2 lg:grid-cols-4 lg:gap-12 no-scrollbar">
    @foreach ($categories as $category)
        <div class="group flex flex-col flex-shrink-0 
                    w-40 snap-center sm:w-auto">
            {{-- Diubah dari w-64 menjadi w-40 (sekitar 160px) untuk mobile, dan sm:w-auto untuk grid --}}
            <div class="relative">
                <div class="aspect-square overflow-hidden rounded-2xl">
                    {{-- Menggunakan aspect-square sebagai pengganti aspect-4/4 --}}
                    @if ($category->hasMedia('categories'))
                        <img class="size-full object-cover rounded-2xl"
                            src="{{ $category->getFirstMediaUrl('categories', 'preview') }}" alt="Category Image">
                    @else
                        <div class="size-full flex items-center justify-center bg-gray-200">
                            <span class="text-gray-500 text-sm">No Image</span>
                        </div>
                    @endif
                </div>

                <div class="pt-4">
                    <h3 class="font-medium md:text-lg text-black text-center">
                        {{ $category->name }}
                    </h3>
                </div>

                <a class="after:absolute after:inset-0 after:z-1" href="{{ route('front.products', ['category' => $category->id]) }}"></a>
            </div>
        </div>
    @endforeach
</div>


<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
