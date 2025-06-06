<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/hyperscroll@1.0.0/dist/hyperscroll.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('build/assets/app-9d98b757.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/app-d66ac298.css') }}">
    <script src="{{ asset('build/assets/app-1d1e7247.js') }}" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>
<body>

    @include('components.navbar')
    
    @yield('content')

    @include('components.whatsapp')
    @include('components.section_card')
    @include('components.footer')
    <script src="./assets/vendor/preline/dist/preline.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>