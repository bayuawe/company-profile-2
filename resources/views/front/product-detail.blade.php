@extends('layouts.app')

@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content">
        <div class="max-w-4xl mx-auto py-12 px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <div class="aspect-4/4 overflow-hidden rounded-2xl">
                        <img src="{{ $product->image_url ?: asset('fallback.jpg') }}" alt="{{ $product->name }}"
                            class="w-full h-full object-cover rounded-2xl">
                    </div>
                </div>

                <div>
                    <h1 class="text-2xl font-bold mb-4">{{ $product->name }}</h1>
                    <p class="text-xl font-semibold mb-4">Rp.{{ number_format($product->price, 2) }}</p>
                    <div class="prose max-w-none">{!! $product->description !!}</div>
                </div>
            </div>
        </div>
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
