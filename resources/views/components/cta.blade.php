<div class="py-6 md:py-12 max-w-2xl text-center mx-auto">
    <h2 class="font-medium text-black text-2xl sm:text-4xl ">
        Kontak Kami
    </h2>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 lg:items-center gap-6 md:gap-8 lg:gap-12">
    <div class="aspect-w-16 aspect-h-6 lg:aspect-h-14 overflow-hidden bg-gray-100 rounded-2xl ">
        @if ($settings->hasMedia('contact_image'))
            <img class="group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out object-cover rounded-2xl"
                src="{{ $settings->getFirstMediaUrl('contact_image') }}" alt="Contacts Image">
        @else
            <img class="group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out object-cover rounded-2xl"
                src="https://images.unsplash.com/photo-1572021335469-31706a17aaef?q=80&w=560&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="Contacts Image">
        @endif
    </div>
    <!-- End Col -->

    <div class="space-y-8 lg:space-y-16">
        <div>
            <h3 class="mb-5 font-semibold text-black ">
                Alamat Kami
            </h3>

            <!-- Grid -->
            <div class="grid sm:grid-cols-2 gap-4 sm:gap-6 md:gap-8 lg:gap-12">
                <div class="flex gap-4">
                    <svg class="shrink-0 size-5 text-gray-500 " xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>

                    <div class="grow">
                        <address class="mt-1 text-black not-italic ">
                            {{ $settings->contact_address }}
                        </address>
                    </div>
                </div>
            </div>
            <!-- End Grid -->
        </div>

        <div>
            <h3 class="mb-5 font-semibold text-black ">
                Hubungi Kami
            </h3>

            <!-- Grid -->
            <div class="grid sm:grid-cols-2 gap-4 sm:gap-6 md:gap-8 lg:gap-12">
                <div class="flex gap-4">
                    <svg class="shrink-0 size-5 text-gray-500 " xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z">
                        </path>
                        <path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10"></path>
                    </svg>

                    <div class="grow">
                        <p class="text-sm text-gray-600 ">
                            Email
                        </p>
                        <p>
                            <a class="relative inline-block font-medium text-black before:absolute before:bottom-0.5 before:start-0 before:-z-1 before:w-full before:h-1 before:bg-yellow-400 hover:before:bg-black focus:outline-hidden focus:before:bg-black"
                                href="mailto:example@site.so">
                                {{ $settings->contact_email }}
                            </a>
                        </p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <svg class="shrink-0 size-5 text-gray-500 " xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                    </svg>

                    <div class="grow">
                        <p class="text-sm text-gray-600 ">
                            Telp.
                        </p>
                        <p>
                            <a class="relative inline-block font-medium text-black before:absolute before:bottom-0.5 before:start-0 before:-z-1 before:w-full before:h-1 before:bg-yellow-400 hover:before:bg-black focus:outline-hidden focus:before:bg-black"
                                href="mailto:example@site.so">
                                {{ $settings->contact_phone }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- End Grid -->
        </div>
    </div>
    <!-- End Col -->
</div>

<!-- Contact Form -->
<div class="mt-12 max-w-2xl mx-auto">
    <div class="text-center mb-8">
        <h2 class="text-2xl font-semibold text-black">Kirim Pesan</h2>
        <p class="mt-2 text-gray-600">Kami siap membantu Anda. Kirim pesan dan kami akan segera merespons.</p>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
        <form action="{{ route('front.contact.submit') }}" method="POST">
            @csrf
            <div class="grid gap-4">
                <div>
                    <label for="name" class="block mb-2 text-sm text-gray-700 font-medium">Nama Lengkap</label>
                    <input type="text" name="name" id="name" required
                        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-yellow-500 focus:ring-yellow-500 disabled:opacity-50 disabled:pointer-events-none"
                        placeholder="Masukkan nama lengkap Anda">
                </div>

                <div>
                    <label for="email" class="block mb-2 text-sm text-gray-700 font-medium">Email</label>
                    <input type="email" name="email" id="email" required
                        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-yellow-500 focus:ring-yellow-500 disabled:opacity-50 disabled:pointer-events-none"
                        placeholder="Masukkan email Anda">
                </div>

                <div>
                    <label for="message" class="block mb-2 text-sm text-gray-700 font-medium">Pesan</label>
                    <textarea id="message" name="message" rows="4" required
                        class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-yellow-500 focus:ring-yellow-500 disabled:opacity-50 disabled:pointer-events-none"
                        placeholder="Tulis pesan Anda di sini"></textarea>
                </div>
            </div>

            <!-- Checkbox -->
            <div class="mt-4 flex">
                <div class="flex">
                    <input id="privacy" name="privacy" type="checkbox" required
                        class="shrink-0 mt-1.5 border-gray-200 rounded-sm text-yellow-600 focus:ring-yellow-500">
                </div>
                <div class="ms-3">
                    <label for="privacy" class="text-sm text-gray-600">
                        Dengan mengirim formulir ini, saya telah membaca dan menyetujui
                        <a class="text-yellow-600 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium" href="#">
                            Kebijakan Privasi
                        </a>
                    </label>
                </div>
            </div>
            <!-- End Checkbox -->

            <div class="mt-6">
                <button type="submit"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-yellow-500 text-black hover:bg-yellow-400 focus:outline-hidden focus:bg-yellow-400 disabled:opacity-50 disabled:pointer-events-none transition">
                    Kirim Pesan
                </button>
            </div>

            <div class="mt-3 text-center">
                <p class="text-sm text-gray-500">
                    Kami akan merespons dalam 1-2 hari kerja.
                </p>
            </div>
        </form>
    </div>
</div>
<!-- End Contact Form -->
