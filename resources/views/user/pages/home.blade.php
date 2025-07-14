<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{-- Title --}}
    <title>@yield('title', 'Beranda | Sukun Sigaret')</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('assets/src/sukun_favicon.png') }}" type="image/png" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet" />

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet" />

    <!-- <link href="./src/output.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/output.css') }}">
</head>

<body class="font-['DM_Sans']">
    <nav id="main-navbar"
        class="fixed start-0 top-0 z-20 w-full border-0 border-gray-200 bg-blue-900 transition-colors duration-300 dark:border-gray-600 dark:bg-gray-900 text-slate-800 shadow-lg"> {{-- Saran Dosen Pembimbing bagian Header di kasih pembatas biar gak nyatu dengan Body Sectionnya | text-slate-800 shadow-lg (cuma sementara harusnya fixed, setelah di scroll hilang...) --}}
        <div class="mx-auto flex max-w-screen-lg flex-wrap items-center justify-between px-5 py-5">
            <a href="{{ route('user.home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('/assets/src/sukun.png') }}" class="h-11" alt="Sukun Logo" />
                <!-- <span class="self-center whitespace-nowrap text-2xl font-semibold dark:text-white">Flowbite</span> -->
            </a>
            <div class="flex space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="hidden w-full items-center justify-between md:order-1 md:flex md:w-auto" id="navbar-sticky">
                <ul
                    class="bg-neutral-900 lg:bg-transparent md:bg-transparent mt-4 gap-x-5 flex flex-col rounded-lg border border-gray-100 bg-gray-50 p-4 font-medium dark:border-gray-700 dark:bg-gray-800 md:mt-0 md:flex-row md:space-x-10 md:border-0 md:bg-white-100 md:p-0 md:dark:bg-gray-900 rtl:space-x-reverse">
                    <li>
                        <a href="{{ route('user.home') }}"
                            class="block rounded px-3 py-2 hover:bg-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:p-0 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:bg-transparent md:dark:hover:text-blue-500 font-normal"><span
                                class="text-slate-900 lg:text-white md:text-white">Home</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('lowongan.index') }}"
                            class="block rounded px-3 py-2 hover:bg-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:p-0 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:bg-transparent md:dark:hover:text-blue-500 font-normal">
                            <span class="text-slate-900 lg:text-white md:text-white">Karir</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- <section
      class="bg-cover bg-center h-[400px] mt-20"
      style="
        background-image: url('https://e-recruitment.garudafood.co.id/Files/Banner/Banner%20Webcareer%201%20(12-4).jpg');
      "
    >
      <div class="flex items-center justify-center h-full">
        <h1 class="text-white text-4xl font-bold">Careers</h1>
      </div>
    </section> -->

    <!-- <section class="mt-20">
      <div class="swiper h-[400px]">
        <div class="swiper-wrapper">
          <div
            class="swiper-slide bg-cover bg-center"
            style="
              background-image: url('https://e-recruitment.garudafood.co.id/Files/Banner/Banner%20Webcareer%201%20(12-4).jpg');
            "
          >
            <div class="flex items-center justify-center h-full bg-black/30">
              <h1 class="text-white text-4xl font-bold">Karir</h1>
            </div>
          </div>

          <div
            class="swiper-slide bg-cover bg-center"
            style="
              background-image: url('https://e-recruitment.garudafood.co.id/Files/Banner/Banner%20Webcareer%202%20(12-4).png');
            "
          >
            <div class="flex items-center justify-center h-full bg-black/30">
              <h1 class="text-white text-4xl font-bold">Join Our Team</h1>
            </div>
          </div>
        </div>

        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </section> -->

    <section class="mx-5 mx-auto mt-20 bg-cover bg-center bg-blue-900 h-[380px] h-[350px] lg:h-[550px]">
        <!-- <section
      class="mx-5 mx-auto mt-20 bg-cover bg-center bg-[url('https://img.freepik.com/free-photo/abstract-luxury-gradient-blue-background-smooth-dark-blue-with-black-vignette-studio-banner_1258-54368.jpg?semt=ais_hybrid&w=740')] h-[350px] lg:h-[550px]"
    > -->
        <div class="max-w-screen-lg mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 justify-between items-center pt-[40px] mx-5">
                <div class="flex flex-col gap-5 justify-center items-center">
                    <h4 class="text-4xl lg:text-5xl md:text-5xl font-bold text-neutral-100">
                        Melangkah Bersama, Berkarya untuk Masa Depan
                    </h4>
                    <p class="text-neutral-200">
                        Temukan semangat berkarya dan berinovasi bersama PT. Sukun Wartono
                        Indonesia. Di sini, jadi bagian dari perjalanan hidup yang
                        bermakna.
                    </p>
                </div>
                <div class="flex justify-center items-center">
                    <!-- <img
              src="https://visionaryconsulting.id/assets/images/vc2.png"
              alt="Logo2"
              class="w-[350px] hidden lg:block"
            /> -->

                    <div
                        class="lg:w-[350px] lg:h-[400px] bg-neutral-500 hidden lg:block md:block md:h-[200px] md:w-[175px]"> {{-- BANER PICTURE HEADER, GAK COCOK WKWKW🗿🙏 || style="background-image: url('assets/src/banerskntry2.png')" --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--_______________________________________________________________________________________________________________________________________________--}}

    {{-- Filter Form --}}
    <section class="max-w-screen-lg mx-auto -mt-10 relative z-2">
        <section class="relative -mt-12 z-20 px-4">
            <form method="GET" action="{{ route('lowongan.index') }}"
            {{-- <form method="GET" action="{{ route('user.home') }}"  --}}
            {{-- class="flex flex-col md:flex-row gap-4 justify-center bg-white px-5 py-5 shadow-lg rounded-xl"> --}}
                class="bg-white rounded-xl shadow-lg px-6 py-4 max-w-6xl mx-auto flex flex-col md:flex-row gap-4 items-center">
                
                {{-- Pengalaman --}}
                <select name="pengalaman" class="w-full md:w-1/4 rounded-lg border border-gray-300 px-4 py-2 text-sm">{{-- py-3 | focus:outline-none focus:ring-2 focus:ring-blue-500 --}}
                    <option value="">Semua Pengalaman</option>
                    <option value="fresh_graduate" {{ request('pengalaman') == 'fresh_graduate' ? 'selected' : '' }}>Fresh Graduate</option>
                    <option value="experienced" {{ request('pengalaman') == 'experienced' ? 'selected' : '' }}>Experienced</option>
                </select>

                {{-- Kategori dari DB --}}
                <select name="category_id" class="w-full md:w-1/4 rounded-lg border border-gray-300 px-4 py-2 text-sm">{{-- py-3 | focus:outline-none focus:ring-2 focus:ring-blue-500 --}}
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                    {{-- ⌛Sebelumnya filter kategori masih hardcoded (option value="Technology" dll)
                    <option value="Technology" {{ request('kategori') == 'Technology' ? 'selected' : '' }}>Technology</option>
                    <option value="Marketing" {{ request('kategori') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                    <option value="Finance" {{ request('kategori') == 'Finance' ? 'selected' : '' }}>Finance</option>
                    <option value="Human Resources" {{ request('kategori') == 'Human Resources' ? 'selected' : '' }}>Human Resources</option>
                    --}}
                </select>

                {{-- Keyword Search --}}
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Lowongan Kerja" 
                    class="w-full md:w-1/3 rounded-lg border border-gray-300 px-4 py-2 text-sm"/> {{-- py-3 | focus:outline-none focus:ring-2 focus:ring-blue-500 --}}

                {{-- Tombol --}}
                <button type="submit" class="w-full md:w-auto rounded-xl bg-blue-900 text-white rounded-xl px-6 py-2 font-semibold">
                    Search
                </button> {{-- py-3 | class="w-full md:w-auto rounded-xl bg-blue-900 px-6 py-3 text-white font-medium hover:underline transition" --}}      
            </form>
            {{-- 
            @if($lowongans->isEmpty())
                <p class="text-center text-gray-500 mt-4">Tidak ada Lowongan yang cocok ditemukan.</p>
            @endif
            --}}
        </section>

        

        {{--_______________________________________________________________________________________________________________________________________________--}}
        <div class="flex flex-row justify-center items-center mt-10 mx-5">
            <h1 class="text-2xl font-semibold text-neutral-800">
                Lowongan Terbaru
            </h1>

            <!-- <a href="" class="underline text-sm text-blue-900">Lihat Semua</a> -->
        </div>

        {{-- ||||| ~~~~~~~ Hard Code punya Pak Anang ~~~~~~~ ||||| <!-- Daftar Lowongan -->
        <div class="mt-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-6 max-w-[1000px] mx-5">
                <a href="#" class="block rounded-lg p-5 shadow-md hover:bg-neutral-50 taransition duration-300">
                    <h2 class="text-lg font-semibold text-slate-900 hover:text-blue-900">
                        MANAGEMENT DEVELOPMENT PROGRAM (MDP)
                    </h2>

                    <!-- Badge -->
                    <span
                        class="inline-block mt-2 rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-800">
                        Fresh Graduate
                    </span>
                    <span
                        class="inline-block mt-2 rounded-full bg-purple-100 px-3 py-1 text-xs font-medium text-purple-800">
                        Management Trainee
                    </span>

                    <!-- Part-time -->
                    <div class="flex items-center gap-2 mt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C8.686 2 6 4.686 6 8c0 3.314 3.134 6.134 5.293 8.293a1 1 0 001.414 0C14.866 14.134
                                 18 11.314 18 8c0-3.314-2.686-6-6-6zm0 9a3 3 0 110-6 3 3 0 010 6z" />
                        </svg>
                        <p class="text-sm text-slate-600">Kudus</p>
                    </div>

                    <!-- Part-time -->
                    <div class="flex items-center gap-2 mt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text-sm text-slate-600">21 Juni - 21 Desember 2025</p>
                    </div>
                </a>
            </div>
        </div> --}}

        {{-- @foreach ($lowongans as $lowongan)
        <div class="..."> <!-- Card -->
            <h2>{{ $lowongan->judul }}</h2>
            <span>{{ $lowongan->lokasi }}</span>
            <p>{{ \App\Helpers\FormatHelper::tanggalIndonesia($lowongan->tanggal_mulai) }} -
                {{ \App\Helpers\FormatHelper::tanggalIndonesia($lowongan->tanggal_selesai)}}
            </p>
        </div>
        @endforeach --}}
        {{--
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        --}}

        {{-- {{-- Lowongan Terbaru // Ntahlah ini malah bikin double tulisan lowongan Terbaru🗿🗿🗿🗿🗿🗿
        <section class="...">
            <div class="flex flex-row justify-center ...">
                <h1 class="...">Lowongan Terbaru</h1>
                <a href="{{ route('lowongan.index') }}" class="underline text-sm text-blue-900">Lihat Semua</a>
            </div> --}}

            {{-- versi human readable (Experienced, Fresh Graduate) --}}
            @php
                $pengalamanLabel = [
                    'experienced' => 'Experienced',
                    'fresh_graduate' => 'Fresh Graduate' 
                ];
            @endphp

            {{-- Daftar Lowongan --}}
            <div class="mt-8"> {{-- Dua Baris ini pakek dari punya mentor, baris ini dan bawahnya --}}
                <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-6 max-w-[1000px] mx-5"> {{-- Biar cuma 3 yang muncul di index view bagian depan yang dilihat user --}}
                    <!-- <div class="grid grid-cols-1 lg:grid-col-3 gap-6 mt-8"> -->
                    @forelse ($lowongans as $lowongan)
                        <a href="{{ route('lowongan.detail', $lowongan->slug) }}" 
                            class="block rounded-lg shadow-md p-6 hover:bg-gray-50 transition duration-300">

                            {{-- Judul --}}
                            <h2 class="font-semibold text-lg text-neutral-800 mb-2">
                                {{ $lowongan->judul }}
                            </h2>

                            {{-- Badge --}}
                            <div class="flex space-x-2 mb-3">
                                <span class="inline-block rounded bg-blue-100 px-3 py-1 text-xs font-medium text-blue-800">
                                    {{-- ⬇️ versi human readable (Experienced, Fresh Graduate) --}}
                                    {{ $pengalamanLabel[$lowongan->pengalaman] ?? ucfirst($lowongan->pengalaman) }} {{-- {{ $lowongan->pengalaman }} --}}
                                </span> {{-- Fresh Graduate</span> --}}
                                <span class="inline-block rounded bg-purple-100 px-3 py-1 text-xs font-medium text-purple-800">
                                    {{ $lowongan->category->name }} {{-- asalnya cuma {{ $lowongan->kategori }} --}}
                                </span>
                            </div>

                            {{-- Lokasi --}}
                            <div class="flex items-center gap-2 mb-1 text-slate-600"> 📍
                                <!-- KURANG MIRIP DENGAN PUNYA MENTOR | <x-icon.map-pin class="h-5 w-5" /> -->
                                {{-- ICON dari Punya Mentor
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 2C8.686 2 6 4.686 6 8c0 3.314 3.134 6.134 5.293 8.293a1 1 0 001.414 0C14.866 14.134 18 11.314 18 8c0-3.314-2.686-6-6-6zm0 9a3 3 0 110-6 3 3 0 010 6z" />
                                </svg>
                                --}}
                                <p>{{ $lowongan->lokasi }}</p>
                            </div>



                            {{-- Tanggal --}}
                            <div class="flex items-center gap-2 text-slate-600 mt-2"> 📅
                                {{--🔥🔥🔥🔥 <x-icon.calendar class="h-5 w-5"/> | Icon Calendar --}}
                                {{-- This is NOT ACTIVE ⬇️ 🗿🔥
                                <p>{{ \App\Helpers\FormatHelper::tanggalIndonesia($lowongan->tanggal_buka) }}
                                    -
                                    {{ \App\Helpers\FormatHelper::tanggalIndonesia($lowongan->tanggal_tutup) }}
                                </p>
                                --}}

                                {{-- Pakai INI ⬇️ atau 
                                <p>
                                    <i class="bi bi-calendar"></i>
                                    {{ \Carbon\Carbon::parse($lowongan->tangga_buka)->format('d M Y')  }}
                                    -
                                    {{ \Carbon\Carbon::parse($lowongan->tanggal_tutup)->format('d M Y')  }}
                                </p>
                                Yang BAWAHNYA ⬇️--}}

                                <td>     
                                    {{-- Format English 🇬🇧 --}}                       
                                    {{-- 🔍 $lowongan->tangga_buka — itu typo! Harusnya: ✅ $lowongan->tanggal_buka --}}
                                    <!-- {{ $lowongan->tanggal_buka ? \Carbon\Carbon::parse($lowongan->tanggal_buka)->format('d M Y') : '-' }}
                                    -
                                    {{ $lowongan->tanggal_tutup ? \Carbon\Carbon::parse($lowongan->tanggal_tutup)->format('d M Y') : '-' }} -->
                                    
                                    {{-- Format Indonesia 🇮🇩 --}}
                                    {{ \Carbon\Carbon::parse($lowongan->tanggal_tutup)->locale('id')->isoFormat('D MMMM Y') }}
                                    -
                                    {{ \Carbon\Carbon::parse($lowongan->tanggal_buka)->locale('id')->isoFormat('D MMMM Y') }}
                                </td>
                            </div>

                            {{-- Lokasi, Yang sebelumnya --}}
                            {{-- <div class="flex items-center gap-2 mb-1 text-slate-600">
                                // Icon Lokasi //
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20l-7-7-7 7" />
                                </svg>
                                <p>{{ $lowongan->lokasi }}</p>
                            </div>

                            {{-- Tanggal, Yang sebelumnya --}}
                            {{-- <div class="flex items-center gap-2 text-slate-600">
                                // Icon Kalender //
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" vieBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10m-10 4h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p>{{ tanggal_indonesia($lowongan->tanggal_mulai) }} - {{
                                    tanggal_indonesia($lowongan->tanggal_selesai) }}</p>
                            </div> --}}
                        </a>
                    @empty
                        {{-- Message pendek biasa aja | <p class="text-center col-span-3 text-slate-500">Belum ada lowongan tersedia.</p> --}}
                        <p class="text-center col-span-3 text-slate-500">
                            Tidak ditemukan lowongan untuk
                            @if(request('search')) keyword "<strong>{{ request('search') }}</strong>" @endif
                            @if(request('kategori')) di kategori "<strong>{{ request('kategori') }}</strong>" @endif
                            @if(request('pengalaman')) dengan pengalaman "<strong>{{ request('pengalaman') }}</strong>" @endif
                        </p>
                    @endforelse
                </div>
            </div>
            <!-- </section> -->



            {{-- list lowongan ➔ tinggal loop gini: --}}

            {{-- <section id="lowongan">
                <div class="container">
                    <h2>Lowongan Tersedia</h2>
                    <div class="row">
                        @foreach ($lowongans as $item)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->judul }}</h5>
                                    <p class="card-text">{{ Str::limit(strip_tags($item->deskripsi), 100) }}</p>
                                    <a href="{{ route('lowongan.detail', $item->id) }}" class="btn btn-primary">Lihat
                                        Detail</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section> --}}

            {{-- ----------------------------------- --}}


            <div class="mt-10 flex items-center justify-center">
                <a href="{{ route('lowongan.index') }}"
                    class="text-sm text-blue-900 border-2 border-blue-900 rounded-lg px-4 py-2 flex items-center hover:underline">
                    <span>Lihat Semua</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </section>

        <section class="mx-5 mx-auto mt-10 my-20 relative bg-cover bg-center" style="background-image: url('assets/src/banerskn3.png')"> {{-- BANER BG ABOUT --}}
            <!-- <section class="mx-5 mx-auto mt-10 my-20 relative bg-neutral-50"> -->
            <div class="max-w-screen-lg mx-auto">
                <div class="mx-5 grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 justify-center items-center gap-8">
                    <div class="">
                        <!-- <img
              src="https://visionaryconsulting.id/assets/images/vc2.png"
              alt="Logos"
              class="w-[350px]"
            /> -->

                        <div class="w-[200px] h-[400px] sm:h-[400px] lg:h-[450px] bg-cover bg-center rounded-xl shadow lg:pr-4" style="background-image: url('{{ asset('assets/src/banerskntry1-upscaled.png') }}')" aria-label="Gedung PT. Sukun"></div> {{-- BANER PICTURE ABOUT || BLANK GRAY --}} {{-- Before : class="w-[350px] h-[400px] bg-neutral-400" --}} {{-- After : class="w-full h-[300px] sm:h-[400px] lg:h-[500px] bg-cover bg-center" --}}
                    </div>

                    <div class="text-justify mb-5">
                        <div class="flex flex-row justify-between items-center">
                            <h1 class="text-3xl font-bold text-blue-900 my-5">
                                Tentang Kami
                            </h1>
                        </div>

                        <p class="text-sm text-slate-700 leading-relaxed">
                            PT. Sukun Wartono Indonesia didirikan dengan sebuah filosofi yang
                            mempercayai bahwa sumber daya manusia adalah faktor terpenting
                            dalam mengembangkan kemajuan perusahaan. Untuk itu, kami selalu
                            menumbuhkan kebudayaan kerja sama di antara para karyawan serta
                            saling menghargai dan menghormati di antara generasi tua dan
                            generasi baru di tubuh perusahaan kami.
                        </p>

                        <p class="text-sm mt-4 text-slate-700 leading-relaxed">
                            Pengembangan diri tetap menjadi fokus utama kami seiring dengan
                            perkembangan zaman yang ada, sehingga kami terus mencari
                            tenaga-tenaga baru yang sejalan dengan misi dan visi kami dalam
                            mengembangkan diri. Perusahaan kami didirikan dengan kepercayaan
                            bahwa sinergi antara generasi tua dan generasi lama adalah
                            kekuatan dan fondasi dasar dalam kemajuan perusahaan.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section class="mx-5 my-20 bg-white">
      <div class="max-w-screen-lg mx-auto">
        <div class="flex flex-col">
          <div class="flex justify-center items-center mb-10">
            <div class="bg-blue-900 px-4 py-2 rounded-lg">
              <h1 class="text-3xl font-bold text-white">Visi & Misi</h1>
            </div>
          </div>

          <div
            class="flex flex-col gap-8 lg:flex-row lg:justify-center lg:items-start"
          >
            <div
              class="flex flex-col gap-4 bg-white p-6 rounded-2xl shadow-lg border w-full lg:w-1/2"
            >
              <h4
                class="text-2xl font-semibold text-blue-900 text-center underline"
              >
                Visi
              </h4>
              <p class="text-sm text-justify text-slate-700 leading-relaxed">
                Menjadi perusahaan rokok yang agile (tangkas) dalam melakukan
                transformasi untuk menghadapi tantangan pasar global dengan
                mengedepankan teknologi dan SDM.
              </p>
            </div>

            <div
              class="flex flex-col gap-4 bg-white p-6 rounded-2xl shadow-lg border w-full lg:w-1/2"
            >
              <h4
                class="text-2xl font-semibold text-blue-900 text-center underline"
              >
                Misi
              </h4>
              <ol
                class="list-decimal pl-5 text-sm text-justify text-slate-700 leading-relaxed space-y-2"
              >
                <li>
                  Melakukan pembaharuan teknologi guna perbaikan kualitas hasil
                  produksi.
                </li>
                <li>
                  Bertanggung jawab penuh atas tugas, keputusan dan tindakan
                  dengan berpegang teguh kepada nilai moral dan etika.
                </li>
                <li>
                  Meningkatkan kinerja guna pencapaian seluruh target dalam
                  rangka menghasilkan profitabilitas optimal.
                </li>
                <li>
                  Mengembangkan sumber daya manusia yang kompeten dan
                  profesional.
                </li>
                <li>Berani berinovasi sesuai dengan tren.</li>
                <li>Membentuk pemimpin perubahan yang hebat.</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section> -->

        <section class="mx-5 mx-auto my-20 bg-white">
            <div class="max-w-screen-lg mx-auto">
                <div class="bg-[url('https://static.vecteezy.com/system/resources/previews/014/031/972/non_2x/abstract-modern-wave-graphic-background-blue-background-abstract-wave-background-design-dark-poster-blue-background-illustration-vector.jpg')] bg-cover bg-center overflow-hidden my-10 mx-5 rounded-2xl animate-bg-wave"> {{-- Before : class="bg-[url('https://static.vecteezy.com/system/resources/previews/014/031/972/non_2x/abstract-modern-wave-graphic-background-blue-background-abstract-wave-background-design-dark-poster-blue-background-illustration-vector.jpg')] bg-cover bg-center overflow-hidden my-10 mx-5 rounded-2xl animate-bg-wave" --}}
                    <!-- <div class="grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 mx-10 py-10"> -->
                    <div class="flex flex-col lg:flex-row mx-10 py-10 gap-y-5 justify-between items-center">
                        <div class="flex justify-center items-center lg:basis-1/2">
                            <h4 class="text-2xl lg:text-3xl md:text-3xl font-bold text-white mx-5">
                                Ayo Bergabung dan Bangun Masa Depanmu Bersama Kami!
                            </h4>
                        </div>
                        <div class="flex justify-center lg:justify-end">
                            <a href="{{ route('lowongan.index') }}"
                                class="text-sm text-blue-950 bg-neutral-100 rounded-lg px-6 py-3 text-center font-medium hover:underline transition h-fit">
                                Temukan Karirmu
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!-- <a
      href="https://wa.me/6282322911262"
      target="_blank"
      class="fixed bottom-6 right-6 z-50 flex items-center justify-center h-14 w-14 rounded-full bg-gradient-to-r from-yellow-400 via-pink-500 to-purple-950 text-white shadow-lg transition animate-pulse"
      aria-label="Chat via WhatsApp"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="32"
        height="32"
        fill="currentColor"
        class="bi bi-instagram"
        viewBox="0 0 16 16"
      >
        <path
          d="M8 0c2.136 0 2.403.008 3.25.047.847.04 1.418.175 1.946.37a3.92 3.92 0 0 1 1.43.93 3.92 3.92 0 0 1 .93 1.43c.195.528.33 1.1.37 1.946.039.847.047 1.114.047 3.25s-.008 2.403-.047 3.25c-.04.847-.175 1.418-.37 1.946a3.92 3.92 0 0 1-.93 1.43 3.92 3.92 0 0 1-1.43.93c-.528.195-1.1.33-1.946.37-.847.039-1.114.047-3.25.047s-2.403-.008-3.25-.047c-.847-.04-1.418-.175-1.946-.37a3.92 3.92 0 0 1-1.43-.93 3.92 3.92 0 0 1-.93-1.43c-.195-.528-.33-1.1-.37-1.946C.008 10.403 0 10.136 0 8s.008-2.403.047-3.25c.04-.847.175-1.418.37-1.946a3.92 3.92 0 0 1 .93-1.43 3.92 3.92 0 0 1 1.43-.93c.528-.195 1.1-.33 1.946-.37C5.597.008 5.864 0 8 0Zm0 1.44c-2.078 0-2.33.008-3.15.046-.76.035-1.17.162-1.44.27-.362.14-.622.308-.895.582a2.48 2.48 0 0 0-.582.895c-.108.27-.235.68-.27 1.44-.038.82-.046 1.072-.046 3.15s.008 2.33.046 3.15c.035.76.162 1.17.27 1.44.14.362.308.622.582.895.273.273.533.441.895.582.27.108.68.235 1.44.27.82.038 1.072.046 3.15.046s2.33-.008 3.15-.046c.76-.035 1.17-.162 1.44-.27.362-.14.622-.308.895-.582.273-.273.441-.533.582-.895.108-.27.235-.68.27-1.44.038-.82.046-1.072.046-3.15s-.008-2.33-.046-3.15c-.035-.76-.162-1.17-.27-1.44a2.48 2.48 0 0 0-.582-.895 2.48 2.48 0 0 0-.895-.582c-.27-.108-.68-.235-1.44-.27-.82-.038-1.072-.046-3.15-.046ZM8 3.89a4.11 4.11 0 1 1 0 8.22 4.11 4.11 0 0 1 0-8.22Zm0 1.44a2.67 2.67 0 1 0 0 5.34 2.67 2.67 0 0 0 0-5.34Zm5.26-.84a.96.96 0 1 1-1.92 0 .96.96 0 0 1 1.92 0Z"
        />
      </svg>
    </a> -->
    <!-- <div class="mt-[-300px] ms-[-200px] opacity-25 absolute">
      <svg
        viewBox="0 0 200 200"
        height="500"
        width="500"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          fill="#fed975"
          d="M43.8,-46.9C59.9,-38.6,78.5,-27.9,83.7,-12.6C89,2.7,81,22.4,68.7,35.8C56.3,49.1,39.6,56.1,21.8,64.5C4,73,-14.9,83,-31.7,80C-48.5,76.9,-63.2,60.9,-72,42.9C-80.8,24.9,-83.8,4.8,-78.4,-11.7C-73,-28.2,-59.1,-41,-44.6,-49.7C-30.2,-58.3,-15.1,-62.7,-0.6,-62C13.8,-61.2,27.6,-55.3,43.8,-46.9Z"
          transform="translate(100 100)"
        />
      </svg>
    </div> -->

    <section id="footer" class="mx-5 mx-auto bg-blue-900 z-10 relative">
        <div class="py-20 max-w-screen-lg mx-auto">
            <div class="mx-5 grid grid-cols-1 lg:grid-cols-3 md:grid-cols-3">
                <div class="flex flex-col gap-y-3">
                    <span class="font-bold text-slate-200 text-xl">
                        PT. Sukun Wartono Indonesia
                    </span>
                    <span class="font-light text-slate-200 text-sm text-start block">
                        Jl. Raya PR Sukun No. 1-2 Gondosari, Gebog, Kabupaten Kudus, Jawa Tengah 59354, Indonesia
                    </span>

                    <ul class="mt-5 text-sm text-slate-200">
                        <li>
                            <a href="mailto:visionaryconsultingofficial@gmail.com" class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 mr-2"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 12.713l-11.985-7.713v13.5c0 1.104.896 2 2 2h19.97c1.104 0 2-.896 2-2v-13.5l-11.985 7.713zm11.985-9.713c0-1.104-.896-2-2-2h-19.97c-1.104 0-2 .896-2 2v.217l12 7.732 11.985-7.732v-.217z" />
                                </svg>
                                karir@sukunsigaret.com
                            </a>
                        </li>
                    </ul>
                </div>

                <div></div>

                <div class="flex flex-col justify-center items-end space-y-3 mt-10 lg:mt-0">
                    <div class="font-['Rubik']">
                        <h4 class="text-4xl text-white font-bold">
                            Temukan Kami di
                        </h4>
                    </div>

                    <div class="flex flex-row space-x-5">
                        <a href="https://www.instagram.com/pt.sukun" target="_blank"
                            class="flex items-center gap-x-2">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_17_63)">
                                    <path
                                        d="M24 4.32187C30.4125 4.32187 31.1719 4.35 33.6938 4.4625C36.0375 4.56562 37.3031 4.95938 38.1469 5.2875C39.2625 5.71875 40.0688 6.24375 40.9031 7.07812C41.7469 7.92188 42.2625 8.71875 42.6938 9.83438C43.0219 10.6781 43.4156 11.9531 43.5188 14.2875C43.6313 16.8187 43.6594 17.5781 43.6594 23.9813C43.6594 30.3938 43.6313 31.1531 43.5188 33.675C43.4156 36.0188 43.0219 37.2844 42.6938 38.1281C42.2625 39.2438 41.7375 40.05 40.9031 40.8844C40.0594 41.7281 39.2625 42.2438 38.1469 42.675C37.3031 43.0031 36.0281 43.3969 33.6938 43.5C31.1625 43.6125 30.4031 43.6406 24 43.6406C17.5875 43.6406 16.8281 43.6125 14.3063 43.5C11.9625 43.3969 10.6969 43.0031 9.85313 42.675C8.7375 42.2438 7.93125 41.7188 7.09688 40.8844C6.25313 40.0406 5.7375 39.2438 5.30625 38.1281C4.97813 37.2844 4.58438 36.0094 4.48125 33.675C4.36875 31.1438 4.34063 30.3844 4.34063 23.9813C4.34063 17.5688 4.36875 16.8094 4.48125 14.2875C4.58438 11.9437 4.97813 10.6781 5.30625 9.83438C5.7375 8.71875 6.2625 7.9125 7.09688 7.07812C7.94063 6.23438 8.7375 5.71875 9.85313 5.2875C10.6969 4.95938 11.9719 4.56562 14.3063 4.4625C16.8281 4.35 17.5875 4.32187 24 4.32187ZM24 0C17.4844 0 16.6688 0.028125 14.1094 0.140625C11.5594 0.253125 9.80625 0.665625 8.2875 1.25625C6.70312 1.875 5.3625 2.69062 4.03125 4.03125C2.69063 5.3625 1.875 6.70313 1.25625 8.27813C0.665625 9.80625 0.253125 11.55 0.140625 14.1C0.028125 16.6687 0 17.4844 0 24C0 30.5156 0.028125 31.3312 0.140625 33.8906C0.253125 36.4406 0.665625 38.1938 1.25625 39.7125C1.875 41.2969 2.69063 42.6375 4.03125 43.9688C5.3625 45.3 6.70313 46.125 8.27813 46.7344C9.80625 47.325 11.55 47.7375 14.1 47.85C16.6594 47.9625 17.475 47.9906 23.9906 47.9906C30.5063 47.9906 31.3219 47.9625 33.8813 47.85C36.4313 47.7375 38.1844 47.325 39.7031 46.7344C41.2781 46.125 42.6188 45.3 43.95 43.9688C45.2812 42.6375 46.1063 41.2969 46.7156 39.7219C47.3063 38.1938 47.7188 36.45 47.8313 33.9C47.9438 31.3406 47.9719 30.525 47.9719 24.0094C47.9719 17.4938 47.9438 16.6781 47.8313 14.1188C47.7188 11.5688 47.3063 9.81563 46.7156 8.29688C46.125 6.70312 45.3094 5.3625 43.9688 4.03125C42.6375 2.7 41.2969 1.875 39.7219 1.26562C38.1938 0.675 36.45 0.2625 33.9 0.15C31.3313 0.028125 30.5156 0 24 0Z"
                                        fill="white"></path>
                                    <path
                                        d="M24 11.6719C17.1938 11.6719 11.6719 17.1938 11.6719 24C11.6719 30.8062 17.1938 36.3281 24 36.3281C30.8062 36.3281 36.3281 30.8062 36.3281 24C36.3281 17.1938 30.8062 11.6719 24 11.6719ZM24 31.9969C19.5844 31.9969 16.0031 28.4156 16.0031 24C16.0031 19.5844 19.5844 16.0031 24 16.0031C28.4156 16.0031 31.9969 19.5844 31.9969 24C31.9969 28.4156 28.4156 31.9969 24 31.9969Z"
                                        fill="white"></path>
                                    <path
                                        d="M39.6937 11.1843C39.6937 12.778 38.4 14.0624 36.8156 14.0624C35.2219 14.0624 33.9375 12.7687 33.9375 11.1843C33.9375 9.59053 35.2313 8.30615 36.8156 8.30615C38.4 8.30615 39.6937 9.5999 39.6937 11.1843Z"
                                        fill="white"></path>
                                </g>
                            </svg>
                        </a>

                        <a href="https://www.linkedin.com/company/pt-sukun" target="_blank"
                            class="flex items-center gap-x-2">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M24 0C10.7452 0 0 10.7452 0 24C0 37.2548 10.7452 48 24 48C37.2548 48 48 37.2548 48 24C48 10.7452 37.2548 0 24 0ZM17.28 36H11.52V18H17.28V36ZM14.4 15.6C12.48 15.6 11.04 14.16 11.04 12.24C11.04 10.32 12.48 8.88 14.4 8.88C16.32 8.88 17.76 10.32 17.76 12.24C17.76 14.16 16.32 15.6 14.4 15.6ZM36 36H30.24V26.64C30.24 24.48 29.52 23.04 27.6 23.04C25.92 23.04 24.96 24.24 24.48 25.44C24.24 26.16 24.24 27.12 24.24 28.08V36H18.48V18H24V20.4C24.96 19.2 26.16 18 28.8 18C32.16 18 36 20.16 36 26.16V36Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center bg-blue-900">
            <span class="text-xs text-neutral-200 p-4 text-center">&copy; 
                2025 Crafted by IT PT. Sukun Wartono Indonesia. All rights reserved.
            </span>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

    <script>
        const navbar = document.getElementById("main-navbar");
        // const navLinks = navbar.querySelectorAll("a"); // all <a> inside navbar
        const navLinks = navbar.querySelectorAll("a span");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 10) {
                navbar.classList.remove("bg-blue-900", "dark:bg-gray-900");
                navbar.classList.add("bg-white", "text-slate-800", "shadow");

                navLinks.forEach((link) => {
                    link.classList.remove(
                        "text-white",
                        "lg:text-white",
                        "md:text-white"
                    );
                    link.classList.add("text-slate-800");
                });
            } else {
                navbar.classList.add("bg-blue-900", "dark:bg-gray-900");
                navbar.classList.remove("bg-white", "text-slate-800", "shadow");

                navLinks.forEach((link) => {
                    link.classList.remove("text-slate-800");
                    link.classList.add(
                        "text-slate-900",
                        "lg:text-white",
                        "md:text-white"
                    );
                });
            }
        });
    </script>

    <script>
        const swiper = new Swiper(".swiper", {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

    <!-- <script>
      new TomSelect("#division-select", {
        create: false,
        sortField: {
          field: "text",
          direction: "asc",
        },
      });
    </script> -->
</body>

</html>