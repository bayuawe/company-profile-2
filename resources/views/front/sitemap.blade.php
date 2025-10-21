@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Sitemap</h1>

    <div class="mb-6">
        <p class="text-gray-600 mb-4">XML Sitemap: <a href="{{ route('front.sitemap.xml') }}" class="text-blue-600 hover:text-blue-800">{{ route('front.sitemap.xml') }}</a></p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Main Pages -->
        <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Main Pages</h2>
            <ul class="space-y-2">
                <li><a href="{{ route('index') }}" class="text-blue-600 hover:text-blue-800">Home</a></li>
                <li><a href="{{ route('front.products') }}" class="text-blue-600 hover:text-blue-800">Products</a></li>
                <li><a href="{{ route('front.about') }}" class="text-blue-600 hover:text-blue-800">About Us</a></li>
                <li><a href="{{ route('front.contact') }}" class="text-blue-600 hover:text-blue-800">Contact</a></li>
                <li><a href="{{ route('front.sitemap') }}" class="text-blue-600 hover:text-blue-800">Sitemap</a></li>
            </ul>
        </div>

        <!-- Product Categories -->
        <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Product Categories</h2>
            <ul class="space-y-2">
                @foreach($categories as $category)
                    <li><a href="{{ route('front.products', ['category' => $category->id]) }}" class="text-blue-600 hover:text-blue-800">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>

        <!-- Products -->
        <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Products</h2>
            <ul class="space-y-2">
                @foreach($products as $product)
                    <li><a href="{{ route('front.products.detail', $product->slug) }}" class="text-blue-600 hover:text-blue-800">{{ $product->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
