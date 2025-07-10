@extends('layouts.master')

@section('section')

    {{-- Greeting --}}
    <div class="page-heading" data-aos="fade-down" data-aos-delay="50"> {{-- sedikit aos/animate on scroll --}}
        <h3>Welcome to the Portal Karir web, {{ session('admin')->name ?? 'Admin' }}! ✨</h3>
    </div>

    {{-- Statistik Card --}}
    <div class="page-content">
        <section class="row">
            <!-- Ini Malah batesin Cardnya jadi kecil wkwwk | <div class="col-12 col-lg-12 d-flex justify-content-center"> -->
            <div class="row-100"> {{-- Biar Cardnya Simetris Kanan Kiri Panjanganya --}}
                <div class="row">
                    {{-- Kiri Atas: Lowongan --}}
                    <div class="col-md-6 col-12">
                        {{-- Card Info Lowongan --}}
                        <a href="{{ route('admin.lowongan.index') }}" class="text-decoration-none text-dark
                            focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg block">
                            <div class="card mb-3 shadow-sm shadow-secondary" data-aos="fade-up" data-aos-delay="100"> {{-- sedikit aos/animate on scroll --}}
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-muted">Lowongan Aktif</h6>
                                        <h6 class="font-extrabold mb-0">{{ $jumlahLowongan }}</h6> {{-- angka dynamic --}}
                                    </div>
                                    <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center"
                                        style="width: 25px; height:25px;">
                                        <span class="fw-bold">L</span>
                                    </div>
                                </div>
                            </div>
                        </a>

                        {{-- Card manajemen Lowongan --}}
                        <div class="card shadow-sm shadow-secondary" data-aos="fade-up" data-aos-delay="150"> {{-- sedikit aos/animate on scroll --}}
                            <div class="card-header">
                                <h4 class="card-title">Manajemen Lowongan 💼</h4>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('admin.lowongan.create') }}"
                                    class="btn icon icon-left btn-outline-primary d-inline-flex align-items-center gap-1 shadow-sm shadow-secondary">
                                    <i data-feather="edit"></i>+ Lowongan Baru{{-- pakai [<span class="fw-bold">+</span>
                                    Lowongan Baru] kalau teks, sebelumnya | <i data-feather="edit"></i> + Lowongan Baru --}}
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Kanan Atas: Admin --}}
                    <div class="col-md-6 col-12">
                        {{-- Card info Admin --}}
                        <a href="{{ route('admin.admins.list') }}" class="text-decoratio-none text-dark
                            focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg block"> {{-- routingnya masih
                            belum
                            bener, seharusnya ke halaman lain yang isinya tabel daftar admin HR --}}
                            <div class="card mb-3 shadow-sm shadow-secondary" data-aos="fade-up" data-aos-delay="250"> {{-- sedikit aos/animate on scroll --}}
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-muted">Jumlah Admin</h6>
                                        <h6 class="font-extrabold mb-0">{{ $jumlahAdmin }}</h6> {{-- angka dynamic --}}
                                    </div>
                                    <div class="bg-warning text-white rounded-3 d-flex align-items-center justify-content-center"
                                        style="width: 25px; height:25px;">
                                        <span class="fw-bold">A</span>
                                    </div>
                                </div>
                            </div>
                        </a>

                        {{-- Card manajemen admin --}}
                        <div class="card shadow-sm shadow-secondary" data-aos="fade-up" data-aos-delay="300"> {{-- sedikit aos/animate on scroll --}}
                            <div class="card-header">
                                <h4 class="card-title">Manajemen Admin 🧑‍💻</h4>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('admin.internal-create-admin') }}"
                                    class="btn icon icon-left btn-outline-warning d-inline-flex align-items-center gap-1 shadow-sm shadow-secondary">
                                    <i data-feather="edit"></i>+ Admin Baru{{-- pakai [<span class="fw-bold">+</span> Admin
                                    Baru] kalau teks, sebelumnya | <i data-feather="edit"></i> + Admin Baru --}}
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Kiri Bawah: Category --}}
                    <div class="col-md-6 col-12">
                        {{-- Card manajemen category --}}
                        <a href="{{ route('admin.category.index') }}" class="text-decoration-none text-dark
                            focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg block">
                            <div class="card mb-3 shadow-sm shadow-secondary" data-aos="fade-up" data-aos-delay="350"> {{-- sedikit aos/animate on scroll --}}
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-muted">Total Category</h6>
                                        <h6 class="font-extrabold mb-0">{{ \App\Models\Category::count() }}</h6> {{-- {{
                                        $jumlahCategory }} --}}
                                    </div>
                                    <div class="bg-info text-white rounded-3 d-flex align-items-center justify-content-center"
                                        style="width: 25px; height: 25px;">
                                        <span class="fw-bold">C</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <x-alert />
@endsection

{{-- Buat Test x-alert aja 
@section('script')
<script>
    Swal.fire({
        icon: 'success',
        title: 'Ini manual dari index',
        text: 'Berarti SweetAlert jalan!',
        timer: 9000,
        showConfirmButton: false
    });
</script>
@endsection
--}}