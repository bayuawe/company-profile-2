<!-- ========== FOOTER ========== -->
<footer class="max-w-7xl px-4 sm:px-6 lg:px-8 py-4 lg:py-6 mx-auto">
    <!-- Grid -->
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6 mb-10">
        <div class="col-span-full hidden lg:col-span-1 lg:block">
            <a class="flex-none font-semibold text-xl text-black focus:outline-hidden focus:opacity-80" href="#"
                aria-label="Brand">
                @if ($settings->hasMedia('site_logo'))
                    <img class="h-10" src="{{ $settings->getFirstMediaUrl('site_logo') }}" alt="Logo">
                @else
                    <div
                        class="h-12 w-12 flex items-center justify-center bg-gray-300 text-gray-700 font-semibold rounded text-sm">
                        LOGO
                    </div>
                @endif
            </a>
            <p class="mt-3 text-xs sm:text-sm text-gray-600">
                © 2025 {{ $settings->site_title }}. All rights reserved.
            </p>
        </div>
        <!-- End Col -->

        <div>
            <h4 class="text-xs font-semibold text-gray-900 uppercase">Product</h4>

            <div class="mt-3 grid space-y-3 text-sm">
                @foreach ($categories as $category)
                    <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-hidden focus:text-gray-800"
                            href="{{ route('front.products', ['category' => $category->id]) }}">{{ $category->name }}</a></p>
                @endforeach
            </div>
        </div>
        <!-- End Col -->`

        <div>
            <h4 class="text-xs font-semibold text-gray-900 uppercase">Company</h4>

            <div class="mt-3 grid space-y-3 text-sm">
                <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-hidden focus:text-gray-800"
                        href="{{ route('front.about') }}">About us</a></p>
                <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-hidden focus:text-gray-800"
                        href="#">Careers</a> <span class="inline text-yellow-500">— We're hiring</span></p>
                <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-hidden focus:text-gray-800"
                        href="#">Customers</a></p>
                <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-hidden focus:text-gray-800"
                        href="{{ route('front.sitemap') }}">Sitemap</a></p>
            </div>
        </div>
        <!-- End Col -->
    </div>
    <!-- End Grid -->

    <div class="pt-5 mt-5 border-t border-gray-200">
        <div class="flex flex-wrap justify-between items-center gap-3">
            <div class="mt-3 sm:hidden">
                <a class="flex-none font-semibold text-xl text-black focus:outline-hidden focus:opacity-80"
                    href="#" aria-label="Brand">
                    @if ($settings->hasMedia('site_logo'))
                        <img class="h-8" src="{{ $settings->getFirstMediaUrl('site_logo', 'preview') }}"
                            alt="Logo">
                    @else
                        <div
                            class="h-12 w-12 flex items-center justify-center bg-gray-300 text-gray-700 font-semibold rounded text-sm">
                            LOGO
                        </div>
                    @endif
                </a>
                <p class="mt-1 text-xs sm:text-sm text-gray-600">
                    © 2025 {{ $settings->site_title }}. All rights reserved.
                </p>
            </div>

            <!-- Social Brands -->
            <div class="space-x-4">
                <a class="inline-block text-gray-500 hover:text-gray-800 focus:outline-hidden focus:text-gray-800"
                    href="{{ $settings->sosial_facebook }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-facebook-icon lucide-facebook">
                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                    </svg>
                </a>
                <a class="inline-block text-gray-500 hover:text-gray-800 focus:outline-hidden focus:text-gray-800"
                    href="{{ $settings->sosial_instagram }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-instagram-icon lucide-instagram">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                        <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                    </svg>
                </a>
            </div>
            <!-- End Social Brands -->
        </div>
    </div>
</footer>
<!-- ========== END FOOTER ========== -->
