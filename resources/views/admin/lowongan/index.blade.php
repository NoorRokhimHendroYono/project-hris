@extends('layouts.master')

@section('section')

    <x-alert />

    <div class="page-heading">
        <h3>Data Lowongan</h3>
    </div>

    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card shadow-sm shadow-secondary"> {{-- Sedikit Shadow buat Card --}}
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h4 class="card-title mb-2 mb-md-0">Daftar Lowongan</h4>
                        <a href="{{ route('admin.lowongan.create') }}" class="btn btn-primary shadow-sm shadow-secondary">
                            <i class="bi bi-briefcase"></i> +
                        </a>
                    </div>
                    <div class="card-body">
                        {{-- Filter Dropdown Categories --}}
                        <form method="GET" action="{{ route('admin.lowongan.index') }}" class="row mb-3 g-2">
                            <div class="col-md-4">
                                <select name="category_id" class="form-select shadow-sm shadow-secondary">
                                    <option value="">-- Semua Kategori --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Form Search gak boleh double ❌
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="Cari Judul Lowongan..." value="{{ request('search') }}">
                            </div>
                            --}}
                            <div class="col-md-4 d-flex gap-2">
                                <button type="submit" class="btn btn-outline-primary shadow-sm shadow-secondary">
                                    <i class="bi bi-funnel-fill"></i> Filter
                                </button>
                                <a href="{{ route('admin.lowongan.index') }}" class="btn btn-outline-secondary shadow-sm shadow-secondary">
                                    <i class="bi bi-arrow-clockwise"></i> Reset
                                </a>
                            </div>
                        </form>

                        <div class="card-body">
                            <div class="table-responsive datatable-minimal">
                                <table id="tableLowongan" class="table table-striped"> {{--  style="width: 100%" | class="table table-striped" | class="table dataTable no-footer" --}}
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Lokasi</th>
                                            <th>Durasi</th>
                                            <th>Deskripsi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($lowongans as $index => $lowongan)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $lowongan->judul }}</td>
                                                <td>{{ $lowongan->category->name ?? '-' }}</td> {{-- Kategori --}}
                                                <td>{{ $lowongan->lokasi ?? '-' }}</td>
                                                <td>
                                                    {{ $lowongan->tanggal_buka ? \Carbon\Carbon::parse($lowongan->tangga_buka)->format('d M Y') : '-' }}
                                                    -
                                                    {{ $lowongan->tanggal_tutup ? \Carbon\Carbon::parse($lowongan->tanggal_tutup)->format('d M Y') : '-' }}
                                                </td>
                                                <td>{!! Str::limit(strip_tags($lowongan->requirement), 50) !!}</td>
                                                {{-- 
                                                Padahal tadi udah bagus ini untuk statusnya 😭
                                                <td>
                                                    <span
                                                        class="badge {{ $lowongan->status === 'aktif' ? 'bg-success' : 'bg-danger' }}">
                                                        {{ ucfirst($lowongan->status) }}
                                                    </span>
                                                </td>
                                                --}}
                                                <td> {{-- Toggle GAK GUNA WKWKWK 🗿🔥 --}}
                                                    <button type="submit" 
                                                        class="badge border-0 toggle-status-btn"
                                                        data-id="{{ $lowongan->id }}" 
                                                        {{-- data-status="{{ $lowongan->status }}" --}}
                                                        style="cursor: pointer; background-color: {{ $lowongan->status === 'aktif' ? '#198754' : '#dc3545' }}; color: white;">
                                                        {{ $lowongan->status === 'aktif' ? 'Aktif' : 'Non-aktif' }}
                                                    </button>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.lowongan.show', $lowongan->id) }}"
                                                        class="btn btn-sm btn-outline-info">
                                                        <i class="bi bi-eye"></i> Detail
                                                    </a>
                                                    <a href="{{ route('admin.lowongan.edit', $lowongan->id) }}"
                                                        class="btn btn-sm btn-outline-warning">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </a>
                                                    <form action="{{ route('admin.lowongan.destroy', $lowongan->id) }}" method="POST"
                                                        class="d-inline" onsubmit="return confirmDelete(this)">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            <i class="bi bi-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Belum ada data Lowongan.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script>
        function confirmDelete(form) {
            event.preventDefault();
            Swal.fire({
                title: 'Delete Lowongan ini?',
                text: "Data Lowongan akan dihapus PERMANEN!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33', // Merah
                cancelButtonColor: '#6c757d', // Abu-abu || // '#3085d6', Biru
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>

    <script>
        $(document).ready(function () {
            $('.toggle-status-btn').click(function () {
                var button = $(this);
                var id = button.data('id');

                $.ajax({
                    url     : '/admin/lowongan/' + id + '/toggle',
                    type    : 'POST',
                    data    : {
                        _token  : '{{ csrf_token() }}'
                    },
                    success : function (res) {
                        if (res.success) {
                            let isAktif = res.new_status === 'aktif';
                            button.text(isAktif ? 'Aktif' : 'Non-aktif');
                            button.css('background-color', isAktif ? '198754' : '#dc3545');

                            Swal.fire({
                                toast               : true,
                                position            : 'top-end',
                                icon                : 'success',
                                title               : res.message,
                                showConfirmButton   : false,
                                timer               : 2000
                            });
                        }
                    }
                });
            });
        });
    </script>

    @push('script')
        <script>
            $(document).ready(function () {
                $('#tableLowongan').DataTable({
                    searchDelay: 300,
                    responsive: true,
                    language: {
                        search: "Cari:",
                        lengthMenu: "Tampilkan _MENU_ entri",
                        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        paginate: {
                            previous: "Sebelumnya",
                            next: "Berikutnya"
                        },
                        zeroRecords: "Tidak ada data yang ditemukan"
                    }
                });
            });
        </script>
    @endpush

    {{--
    <script>
        $(document).ready(function () {
            $('toggle-status-btn').click(function () {
                var button = $(this);
                var id = button.data('id');

                $.ajax({
                    url: '/admin/lowongan/' + id + '/toggle',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (res) {
                        if (res.success) {
                            let isAktif = res.new_status === 'aktif';
                            button.text(isAktif ? 'Non-aktif' : 'Aktif');
                            button.css('background-color', isAktif ? '#dc3545' : '#198754');

                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: res.message,
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    }
                });
            });
        });

        $status = $lowongan -> status === 'aktif' ? 'Aktif' : 'Non-Aktif';
        $buttonClass = $lowongan -> status === 'aktif' ? 'btn-success' : 'btn-danger';

        <!-- <button class="toggle-status-btn btn {{ $buttonClass }}" data-id="{{ $lowongan->id }}">
            {{ $status }}
        </button> -->
        --}}
@endsection