<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- Title --}}
    <title>@yield('title', 'Karier | Sukun Sigaret')</title>
    
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('assets/src/sukun.png') }}" type="image/png" />

    {{-- CSS --}}
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
     @stack('styles')

    <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com" />
     <link rel="preconnect" href="https://fonts.gstatic.com crossorigin" />
     <link href="https://fonts.googleapis.com/css2?family=Rubik:ital.wght@0,300..900;1,300..900&display=swap" rel="stylesheet" />
     <link href="https://fonts.googleapis.com/css2?family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />

    <!-- Flowbite CSS -->
     <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

    <!-- Swiper CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- Tom Select -->
     <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet" />

    <!-- Tailwind Output CSS -->
     <link href="{{ asset('src/output.css') }}" rel="stylesheet" />

    <!-- Tailwind CDN -->
     <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tambahan: Aktifkan plugin Typography -->
     <script>
        tailwind.config = {
            theme: {
                extend: {};
            },
            plugins: [tailwindcss.typography],
        }
     </script>

</head>
<body class="font-['DM_Sans']">
    {{-- Navbar --}}
    @include('user.partials.header')

    {{-- ISI DINAMIS --}}
    @yield('content')

    {{-- Footer --}}
    @include('user.partials.footer')

    <!-- JS -->
    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
     
    <!-- Tambahan JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

</body>
</html>