<!-- Testimonials -->
<div class="py-6 md:py-12 mx-auto">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-black">Testimoni Pelanggan</h2>
        <p class="mt-2 text-gray-600">Apa yang pelanggan kami katakan tentang pengalaman mereka</p>
    </div>

    @if($testimonials->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($testimonials as $testimonial)
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0">
                            @if($testimonial->profile_photo_url)
                                <img class="w-10 h-10 rounded-full object-cover"
                                     src="{{ $testimonial->profile_photo_url }}"
                                     alt="{{ $testimonial->author_name }}">
                            @else
                                <div class="w-10 h-10 rounded-full bg-yellow-500 flex items-center justify-center">
                                    <span class="text-white font-semibold text-sm">
                                        {{ strtoupper(substr($testimonial->author_name, 0, 1)) }}
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="ml-3">
                            <h4 class="text-sm font-semibold text-gray-900">{{ $testimonial->author_name }}</h4>
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                         fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ $testimonial->text }}</p>
                    <div class="mt-4 text-xs text-gray-500">
                        {{ $testimonial->time->format('d M Y') }}
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <div class="max-w-md mx-auto">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada testimoni</h3>
                <p class="mt-1 text-sm text-gray-500">Testimoni akan muncul setelah diambil dari Google Maps.</p>
            </div>
        </div>
    @endif

    <!-- Manual Testimonial Section (Static) -->
    <div class="mt-12 grid grid-cols-1 md:grid-cols-2 md:items-center gap-8">
        <div class="relative h-80 md:h-96 bg-gray-100 rounded-2xl overflow-hidden">
            @if ($settings->hasMedia('about_image'))
                <img class="absolute inset-0 size-full object-cover rounded-2xl"
                    src="{{ $settings->getFirstMediaUrl('about_image', 'preview') }}"
                    alt="About Image">
            @else
                <img class="absolute inset-0 size-full object-cover rounded-2xl"
                    src="https://images.unsplash.com/photo-1557804506-669a67965ba0?q=80&w=560&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="About Image">
            @endif
        </div>

        <div class="space-y-6">
            <div>
                <h3 class="text-2xl font-bold text-black mb-4">Tentang Kami</h3>
                <p class="text-gray-600 leading-relaxed">
                    Kami berkomitmen untuk memberikan produk dan layanan terbaik kepada pelanggan kami.
                    Dengan pengalaman bertahun-tahun, kami terus berinovasi untuk memenuhi kebutuhan Anda.
                </p>
            </div>

            <div class="flex items-center gap-4">
                <div class="flex -space-x-2">
                    <div class="w-8 h-8 rounded-full bg-yellow-500 flex items-center justify-center">
                        <span class="text-white font-semibold text-xs">A</span>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center">
                        <span class="text-white font-semibold text-xs">B</span>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-green-500 flex items-center justify-center">
                        <span class="text-white font-semibold text-xs">C</span>
                    </div>
                </div>
                <span class="text-sm text-gray-600">Bergabung dengan ribuan pelanggan puas</span>
            </div>
        </div>
    </div>
</div>
<!-- End Testimonials -->
