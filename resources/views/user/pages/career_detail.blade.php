<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet" />
    <link href="{{ asset('assets/compiled/css/output.css') }}" rel="stylesheet" />
</head>

<body class="font-['Rubik']">
    <nav id="main-navbar"
        class="fixed start-0 top-0 z-20 w-full border-0 border-gray-200 bg-blue-900 transition-colors duration-300 dark:border-gray-600 dark:bg-gray-900 text-slate-800 shadow-lg"> {{-- Saran Dosen Pembimbing bagian Header di kasih pembatas biar gak nyatu dengan Body Sectionnya | text-slate-800 shadow-lg (cuma sementara harusnya fixed, setelah di scroll hilang...) --}}
        <div class="mx-auto flex max-w-screen-lg flex-wrap items-center justify-between px-5 py-5">
            <a href="index.html" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('/assets/src/sukun.png') }}" class="h-11" alt="Sukun Logo" />
                <!-- <span class="self-center whitespace-nowrap text-2xl font-semibold dark:text-white">Flowbite</span> -->
            </a>
            <div class="flex space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-normal text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
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

    {{--
    ________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________
    --}}

    {{-- ✅ Hero Section --}}
    <section class="relative h-[300px] bg-center bg-cover" style="background-image: url('/assets/src/banerskn2.png');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <h1 class="text-4xl font-bold text-white">{{ $lowongan->judul }}</h1>
        </div>
    </section>

    {{-- versi human readable (Experienced, Fresh Graduate). --}}
    @php
        $pengalamanLabel = [
            'experienced' => 'Experienced',
            'fresh_graduate' => 'Fresh Graduate'
        ];
    @endphp

    {{-- ✅ Detail Lowongan --}}
    <section class="max-w-[1000px] mx-auto px-4 py-0.5"> {{-- Asalnya py-12 --}}
        <div class="flex flex-col gap-y-10 lg:flex-row justify-center mt-20 bg-white py-10">
            <div class="flex justify-center px-4">
                <div class="w-xl bg-white rounded-2xl shadow-md p-6 border">
                    {{-- Judul --}}
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                        {{ $lowongan->judul }}
                    </h1>

                    {{-- Tambahan BARU untuk newbadge dari categories yang ada di DB tersendiri --}}
                    {{-- Badge Info🗣️🗣️🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥 --}}
                    {{-- 
                    <div class="flex flex-wrap gap-2 mb-4">
                        Kategori
                        @if ($lowongan->category)
                            <span class="inline-flex items-center bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full">
                                <i class="bi bi-tags me-1"></i> {{ $lowongan->category->name }}
                            </span>
                        @endif

                        Pengalaman
                        <span
                            class="inline-flex items-center bg-yellow-100 text-yellow-800 text-sm px-3 py-1 rounded-full">
                            @if ($lowongan->pengalaman === 'fresh_graduate')
                                <i class="bi bi-person-plus me-1"></i> Fresh Graduate
                            @elseif ($lowongan->pengalaman === 'experienced')
                                <i class="bi bi-person-check me-1"></i>Experienced
                            @else
                                <i class="bi bi-question-circle me-1"></i> {{ ucfirst($lowongan->pengalaman) }}
                            @endif
                        </span>

                        Status
                        <span
                            class="inline-flex items-center {{ $lowongan->status === 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} text-sm px-3 py-1 rounded-full">
                            <i
                                class="bi {{ $lowongan->status === 'aktif' ? 'bi-check-circle' : 'bi-x-circle' }} me-1"></i>
                            {{ ucfirst($lowongan->status) }}
                        </span>
                    </div>
                    --}}

                    {{-- ✅ Tanggal --}}
                    <div class="flex items-center gap-2 mb-6 text-slate-600 mt-2"> 📅
                        {{--🔥🔥🔥🔥 <x-icon.calendar class="h-5 w-5"/> | Icon Calendar --}}
                        <td>
                            {{ $lowongan->tanggal_buka ? \Carbon\Carbon::parse($lowongan->tangga_buka)->format('d M Y') : '-' }}
                            -
                            {{ $lowongan->tanggal_tutup ? \Carbon\Carbon::parse($lowongan->tanggal_tutup)->format('d M Y') : '-' }}
                        </td>
                    </div>

                    {{-- ✅ Badge --}}
                    <div class="flex gap-2 flex-wrap mt-4">
                        <span class="inline-block rounded bg-blue-100 px-3 py-1 text-xs font-medium text-blue-800"> {{-- rounded = "bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded" --}}
                            {{-- ⬇️ versi human readable (Experienced, Fresh Graduate). --}}
                            {{ $pengalamanLabel[$lowongan->pengalaman] ?? ucfirst($lowongan->pengalaman) }} {{-- {{ $lowongan->pengalaman }} --}}
                        </span>
                        <span class="inline-block rounded bg-purple-100 px-3 py-1 text-xs font-medium text-purple-800"> {{-- rounded = "bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded" --}}
                            {{ $lowongan->category->name }} {{-- asalnya cuma {{ $lowongan->kategori }} --}}
                        </span>
                    </div>

                    {{-- ✅ Deskripsi --}}
                    {{-- Yang sebelumnya | <p class="text-normal text-slate-700 my-4">{!! $lowongan->deskripsi !!}</p>
                    --}}
                    <div class="mb-6 mt-4"> {{-- class="mt-4 prose">{!! $lowongan->deskripsi !!} --}}
                        <h2 class="text-lg font-semibold text-slate-800 mb-2">Deskripsi Pekerjaan📜📃</h2>
                        <div class="text-slate-700 rich-text leading-relaxed prose prose-slate max-w-none">
                            {!! $lowongan->deskripsi !!}
                        </div>
                    </div>

                    {{-- ✅ Requirements --}}
                    {{-- Yang sebelumnya | <div class="mb-4">
                        <h3 class="text-normal font-semibold text-slate-800 mb-1">Requirements:</h3>
                        <p class="text-normal text-slate-700">{!! $lowongan->requirement !!}</p>
                    </div> --}}
                    @if ($lowongan->requirement)
                        <div class="mb-6 mt-4">
                            <h2 class="text-lg font-semibold text-slate-800 mb-2">Requirements📝📄</h2>
                            <div class="text-slate-700 rich-text leading-relaxed prose prose-slate max-w-none">
                                {!! $lowongan->requirement !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- ✅ Penempatan/Lokasi --}}
            <div class="flex flex-col gap-y-8">
                <div class="flex justify-center px-4">
                    <div class="w-xl lg:w-sm h-fit bg-white rounded-2xl shadow-md p-6 border"> {{-- yang sebelumnya pas nyatu dengan div card detail | class="flex items-center gap-2 mb-2 text-slate-600" --}}
                        {{-- Judul --}}
                        <h1 class="text-normal font-bold text-gray-900 mb-4">Penempatan📍🏢</h1>
                        {{-- Part-time --}}
                        <div class="flex items-center gap-2 mt-4">
                            <!-- Kurang MIRIP punya MENTOR | <x-icon.map-pin class="h-5 w-5" /> -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 2C8.686 2 6 4.686 6 8c0 3.314 3.134 6.134 5.293 8.293a1 1 0 001.414 0C14.866 14.134 18 11.314 18 8c0-3.314-2.686-6-6-6zm0 9a3 3 0 110-6 3 3 0 010 6z" />
                            </svg>
                            <p>{{ $lowongan->lokasi }}</p> {{-- class="text-normal text-slate-600" --}}
                        </div>
                    </div>
                </div>

                    {{-- Peringatan --}}
                    <!-- hanya tambahan coulmn untuk buat gapp antara div card detail dan Penempatan | <div class="flex flex-col gap-y-8"></div> -->
                    <div class="flex justify-center px-4">
                        <div class="w-xl lg:w-sm h-fit bg-yellow-100/70 rounded-2xl shadow-md p-6 border border-yellow-300">
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                                </svg>
                                <h2 class="text-md font-bold text-yellow-800">Peringatan📢❗🚨</h2>
                            </div>
                            <p class="text-sm text-yellow-700 mt-2">
                                Proses rekrutmen ini tidak dipungut biaya apapun. Harap
                                berhati-hati terhadap penipuan yang mengatasnamakan perusahaan.
                            </p>
                        </div>
                    </div>


                    <div class="flex justify-center px-4 md:justify-center">
                        <div class="w-xl lg:w-sm flex flex-row gap-x-5 justify-end"> {{-- Tombol di tengah | class="mt-8 flex justify-end gap-x-4" --}}
                            {{-- Tombol Kembali ⬅️ --}}
                            {{-- <a href="{{ route('lowongan.index') }}" --}} {{-- Kembali ke Careers/Lowongan --}} 
                            <a href="{{ route('user.home') }}" {{-- Kembali ke Home --}} {{-- Tombol Bawaan Mentor |
                                class="bg-red-800 text-white font-semibold text-normal md:text-base py-3 px-6 rounded-lg shadow hover:bg-red-900 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500">--}}
                                class="bg-red-800 text-white font-semibold text-normal md:text-base py-3 px-6 rounded-lg shadow hover:bg-red-900 transition duration-300 focus:outline-none focus:ring-2 focus:ring-red-500">
                                <!-- <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 inline-block mr-2"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 19l-7-7 7-7"
                                        />
                                    </svg> -->
                                Kembali {{-- ⬅️ --}}
                            </a>

                            {{-- Tombol Daftar menuju GoogleForm 📝 --}}
                            {{-- Tombol Mengarah ke GoogleForm untuk calon pelamar kerja🏢 --}}
                            {{-- Nanti GoogleForm nya di ganti dari Perusahaan --}}
                            
                            @if($lowongan->link)
                                <a href="{{ $lowongan->link }}" target="_blank" {{-- Before : href="https://forms.gle/your-google-form-link" --}}
                                    class="bg-blue-800 text-white font-semibold text-normal md:text-base py-3 px-6 rounded-lg shadow hover:bg-blue-900 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    {{-- href="#"></a> --}}
                                <!-- <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 inline-block mr-2"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M3 10l9-6 9 6-9 6-9-6zm0 6l9 6 9-6"
                                                />
                                            </svg> -->
                                    Daftar
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    </section>

    {{--
    ________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________
    --}}

    <section id="footer" class="mx-5 mx-auto bg-blue-900">
        <div class="py-20 max-w-screen-lg mx-auto">
            <div class="mx-5 grid grid-cols-1 lg:grid-cols-3 md:grid-cols-3">
                <div class="flex flex-col gap-y-3">
                    <span class="font-bold text-slate-200 text-xl">PT. Sukun Wartono Indonesia</span>
                    <span class="font-light text-slate-200 text-normal text-start block">Jl. Raya PR Sukun No. 1-2
                        Gondosari, Gebog, Kabupaten Kudus, Jawa
                        Tengah 59354, Indonesia</span>

                    <ul class="mt-5 text-normal text-slate-200">
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

                <div class="flex flex-col justify-center items-center space-y-3 mt-10 lg:mt-0">
                    <div class="font-['Rubik']">
                        <h4 class="text-4xl text-white font-bold">Temukan Kami di</h4>
                    </div>

                    <div class="flex flex-row space-x-5 items-end justify-center">
                        <a href="https://www.instagram.com/visionaryconsultingid" target="_blank"
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

                        <a href="https://www.linkedin.com/company/visionaryconsultingid" target="_blank"
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
            <span class="text-xs text-neutral-200 p-4 text-center">&copy; 2025 Crafted by IT PT. Sukun Wartono
                Indonesia. All rights
                reserved.</span>
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