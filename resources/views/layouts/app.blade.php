<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ $settings->getFirstMediaUrl('site_favicon') }}" type="image/x-icon">

    <!-- Google Font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-white">
    @include('components.navbar')
    <div class="max-w-7xl px-4 sm:px-6 lg:px-8 py-4 lg:py-6 mx-auto">
        @yield('content')
    </div>
    @include('components.footer')
</body>

</html>
