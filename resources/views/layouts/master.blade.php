<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Portal Karir</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('assets/src/sukun_favicon.png') }}" type="image/png">
    <!-- <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC" type="image/png"> -->

    {{-- CSS CDN AOS ke layout admin --}}
    <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->
    {{-- Local AOS CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/aos/aos.css') }}">

    {{-- App CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/iconly.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/output.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    {{-- @vite('resources/css/custom.css') --}}

    <!-- DataTables CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" /> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    {{-- Bootstrap Icons | CDN untuk ICON di Tombol --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- CSS CDN AOS ke layout admin --}}
    <!-- <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/dist/aos.css"> -->

    {{-- Trix Editor CDN --}}
    <!-- <link rel="stylesheet" href="https://unpkg.com/trix@2.1.0/dist/trix.css"> -->

    <!-- Quill CSS CDN SEMENTARA -->
    <!-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> -->
    
    {{-- Summernote CSS (local) --}}
    <link rel="stylesheet" href="{{ asset('assets/summernote/summernote-lite.min.css') }}">
    {{-- Summernote CSS (CDN) --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css"> --}}

    {{-- SweetAlert2 Local CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}">

    {{-- Custom CSS harus paling akhir --}}
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    @stack('styles')

    {{-- CSS Override buat styling Button biar warna font nya putih --}}
    <style>
        /* Untuk tombol Detail edit Edit */
        .btn-outline-info:hover,
        .btn-outline-info:active,
        .btn-outline-info:focus {
            background-color: #0dcaf0;     /* Warna info (biru muda) */
            color: #fff !important;
            border-color: #0dcaf0;
        }
        .btn-warning:hover,
        .btn-warning:active,
        .btn-warning:focus {
            background-color: #ffc107;    /* Warna background kuning tetap */
            color: #fff !important;         /* Warna teks jadi putih */   
            border-color: #ffc107;
        }
        .btn-outline-warning:hover,
        .btn-outline-warning:active,
        .btn-outline-warning:focus {
            background-color: #ffc107;
            color: #fff !important;        /* Mengubah warna teks menjadi putih */
            border-color: #ffc107;
        }
    </style>
</head>

<body>
    {{-- Sidebar dan Konten Utama --}}
    <div id="app">
        @include('components.sidebar') 
        <!-- <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="{{ route('admin.index') }}">
                                <img src="{{ asset('assets/src/sukun1.png') }}" alt="Logo" class="h-10 w-auto"> {{-- srcset=""> | src="{{ asset('assets/compiled/svg/logo.svg') }} --}}
                            </a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            Light/Dark Toggle 
                            <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer"> 
                           

                            SVG itu untuk ikon tema gelap/terang, ikon burger menu di header, ikon dashoard di sidebard
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                                preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>


                <div class="sidebar-menu">
                    <ul class="menu"> 
                        Karena master.blade.php kamu pakai struktur sidebar <ul class="menu">, maka harus pakai <li>.
                            <li class="sidebar-title">Menu</li>
                            <li class="sidebar-item active">
                                <a href="{{ route('admin.index') }}" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            Tambah Menu lain di sini
                            <li class="sidebar-item">
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit" class="sidebar-link btn btn-link text-start"
                                        style="color: inherit; text-decoration: none; padding:0 1rem; width:100%;">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->

{{-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}

        {{-- Header --}}
        <div id="main">
            <header class="mb-3"> {{-- d-inline-flex → Membatasi ukuran sesuai isi (ikon saja) | align-items-center justify-center → Tengahin ikon secara vertikal & horizontal | style="width: auto" → Hindari lebarnya memenuhi parent header --}}
                <a href="#" class="burger-btn d-inline-flex d-xl-none align-items-center justify-center p-2" style="width: auto; height:auto;"> {{-- terlalu melebar memanjang di header ketika page di minimize | class="burger-btn d-block d-xl-none" --}}
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            {{-- Content Section --}}
            <div class="page-heading" data-aos="fade-down" data-aos-delay="100"> {{-- sedikit aos/animate on scroll --}}
                {{-- <h3>Dashboard</h3> --}}
                <h3>@yield('title', 'Dashboard 🏢')</h3>
            </div>

            <div class="page-content" data-aos="fade-up" data-aos-delay="0">
                @yield('section')
            </div>

            {{-- Footer --}}
            <footer>
                <div class="footer clearfix mb-0 text-muted" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="400"> {{-- sedikit aos/animate on scroll --}}
                    <div class="float-start">
                        <p>2025 &copy; Student</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"></span>{{-- <i class="bi bi-heart-fill icon-mid"></i>--}}
                            by {{-- <a href="https://saugi.me" target="_blank"> --}}🦅Someone {{-- </a> --}}
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    {{-- jQuery (WAJIB paling atas sebelum summernote) --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    {{-- SweetAlert2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    {{-- SwertAlert2 Local JS --}}
    <script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>

    {{-- Custom Alert (kalau pakai komponen Blade juga oke) --}}
    @include('components.alert')

    {{-- Bootstrap 5 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- JS CDN AOS ke layout admin --}}
    <!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->
    {{-- Local AOS Js --}}
    <script src="{{ asset('assets/extensions/aos/aos.js') }}"></script>
    <script>AOS.init();</script>

    {{-- App & Scroll --}}
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>

    {{-- Perfect Scrollbar (Local) --}}
    <!-- <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script> -->
    {{-- Perfect Scrollbar (CDN) --}}
    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.5/dist/perfect-scrollbar.min.js"></script>

    {{-- DataTables Core + Bootstrap 5 --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    {{-- Editor.js CDN --}}
    <!-- <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@2.8.1"></script> -->

    {{-- Trix Editor CDN --}}
    <!-- <script src="https://unpkg.com/trix@2.1.0/dist/trix.umd.min.js"></script> -->
 
    <!-- Quill JS CDN SEMENTARA -->
    <!-- <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script> -->

    {{-- Summernote JS (Local) --}}
    <script src="{{ asset('assets/summernote/summernote-lite.min.js') }}"></script>
    {{-- Summernote JS (CDN) --}} 
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script> --}}
    {{-- Inisialisasi --}}
    <script src="{{ asset('assets/summernote/summernote-init.js') }}"></script> {{-- sementara saya ganti ',summernote' jadi ',summernoteNT' didalam file -init.js --}}

    {{-- Need: Apexcharts / Optional: Apexcharts untuk dashboard statistik --}}
    <!-- <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/static/js/pages/dashboard.js') }}"></script> -->

    {{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const quillDeskripsi = new Quill('#quill-deskripsi', {
            theme: 'snow',
            placeholder: 'Tulis deskripsi pekerjaan di sini...',
            modules: {
                toolbar: [
                    [{ header: [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline'],
                    ['link', 'blockquote', 'code-block', 'image'],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    ['clean']
                ]
            }
        });

        const quillRequirement = new Quill('#quill-requirement', {
            theme: 'snow',
            placeholder: 'Tulis requirement di sini...',
            modules: {
                toolbar: [
                    [{ header: [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline'],
                    ['link', 'blockquote', 'code-block', 'image'],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    ['clean']
                ]
            }
        });

        // Set value sebelum submit
        const form = document.querySelector('form');
        form.addEventListener('submit', function () {
            document.querySelector('#deskripsi').value = quillDeskripsi.root.innerHTML;
            document.querySelector('#requirement').value = quillRequirement.root.innerHTML;
        });
    });
    </script> --}}

    {{-- Logout Button Confirmation --}}
    <script>
        {{-- document.getElementById('logout-form').addEventListener('submit', function (e) { --}}
        const logoutForm = document.getElementById('logout-form');
        if (logoutForm) {
            logoutForm.addEventListener('submit', function (e) {   
                e.preventDefault(); // Stop dulu submitnya
                Swal.fire({
                    title: 'Yakin mau Logout?',
                    text: "Kamu akan keluar dari sistem!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, logout!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit(); // Kalau klik "Ya", baru submit form logout
                    }
                });
            });
        }
    </script>

    @push('styles')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    @endpush

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#tableLowongan').DataTable({
                    responsive: true,
                    language: {
                        search: "Cari:",
                        lenghtMenu: "Tampilkan _MENU_ data",
                        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                        paginate: {
                            previous: "Sebelumnya",
                            next: "Berikutnya"
                        },
                        zeroRecords: "Tidak ditemukan data yang cocok",
                    }
                });
            });
        </script>
    @endpush

    {{-- Section & Custom Script | Script Tambahan dari Setiap Halaman --}}
    @yield('script')
    @stack('scripts')
    
    <!-- @include('components.alert') -->
    <x-alert />
    
</body>
</html>

<!-- jQuery dan Summernote JS gak ada file localnya malah -->
{{-- 
<script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('assets/extensions/js/summernote-lite.min.js') }}"></script>

<link href="{{ asset('assets/js/summernote-lite.min.css') }}" rel="stylesheet">

<script src="{{ asset('js/summernote-init.js') }}"></script>

<script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
--}}