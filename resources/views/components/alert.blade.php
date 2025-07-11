{{-- Masalahnya:
Di bagian {{ session('...') }}, kamu pakai kutip satu (') dalam kutip satu lainnya,
jadi Blade dan JS bentrok parsing. --}}

{{-- Solusinya:
Kalau dalam Blade kayak gini, harus escape string dengan double quote ("...") di dalam JavaScript.
Alias di JavaScript pakai kutip dua ",
biar Blade {} tetap pakai kutip satu '. --}}

{{-- 
From  : 
text  : '{{ session('success') }}',
text  : '{{ session('error') }}',
ext   : '{{ session('warning') }}',
icon  : '{{ session('toast')['icon'] }}', 
title : '{{ session('toast')['title'] }}', 
text  : '{{ session('toast')['text'] }}', 

Become:
text  : "{{ session('success') }}",
text  : "{{ session('error') }}",
text  : "{{ session('warning') }}",
icon  : "{{ session('toast')['icon'] }}", // succes, error, warning
title : "{{ session('toast')['title'] }}",
text  : "{{ session('toast')['text'] }}",
--}}

@if ($errors->any())
    <script>
        Swal.fire({
            toast   : true,
            icon    : 'error',
            title   : 'Error!',
            text    : "{{ $errors->first() }}",
            position: 'top-end',
            timer   : 1500,
            showConfirmButton: false
        });
    </script>
@endif

{{-- Success Toast --}}
@if (session('success'))
    <script>
        Swal.fire({
            toast   : true,
            icon    : 'success',
            title   : 'Berhasil!',
            text    : "{{ session('success') }}",
            position: 'top-end',
            timer   : 1500,
            timerProgressBar: true,
            showConfirmButton: false,
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon    : 'error',
            title   : 'Gagal!',
            text    : "{{ session('error') }}",
            timer   : 1500,
            timerProgressBar: true,
            showConfirmButton: false,
        });
    </script>
@endif

@if (session('warning'))
    <script>
        Swal.fire({
            icon    : 'warning',
            title   : 'Peringatan!',
            text    : "{{ session('warning') }}",
            timer   : 1500,
            showConfirmButton: false
        });
    </script>
@endif

@if (session('toast'))
    <script>
        window.addEventListener('DOMContentLoaded', function () { {{-- HELL NAH, kurang ini doang untuk load Alertnya --}}
            const Toast = Swal.mixin({
                toast               : true,
                icon                : "{{ session('toast')['icon'] }}",
                title               : "{{ session('toast')['title'] }}",
                text                : "{{ session('toast')['text'] }}",
                position            : 'top-end',
                showConfirmButton   : false,
                timer               : 1700,
                timerProgressBar    : true, // <-- INI nambah progress bar
                didOpen             : (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
            Toast.fire({
                //
            });
        });
    </script>
@endif