<!DOCTYPE html>
<html>

<head>
    <title>Website Karir</title>
    {{-- Bootstrap 4 --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Hover efek buat card --}}
    <style>
        .card:hover {
            transform: translateY(-5px);
            transition: 0.3s;
        }
    </style>
</head>

<body>

    @yield('content')

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Tambah Script Halaman --}}
    @yield('scripts')

</body>

</html>