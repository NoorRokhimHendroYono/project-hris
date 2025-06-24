{{-- @extends('layouts.user') Pake layout Mazer

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Daftar Lowongan</h2>


        🔍 Search & Filter
        <form method="GET" class="mb-4 d-flex justify-content-center">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control w-50 mr-2"
                placeholder="Cari posisi...">
            <select name="status" class="form-control w-25 mr-2">
                <option value="aktif" {{ request('status') == 'aktif' ? 'selrcted' : '' }}>Aktif</option>
                <option value="tutup" {{ request('status') == 'tutup' ? 'selected' : ''}}>Tutup</option>
                <option value="" {{ request('status') == '' ? 'selected' : '' }}>Semua</option>
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <div class="row">
            @foreach ($lowongans as $lowongan)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100 card-hover">
                        <div class="card-body">
                            Judul
                            <h5 class="card-title>">{{ $lowongan->judul }}</h5>
                            <p class="card-text">{{ Str::limit($lowongan->deskripsi, 100) }}</p>

                            Detail
                            <a href="{{ route('user.show', $lowongan->id) }}" class="btn btn-outlie-primary">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center w-100">Tidak ada lowongan saat ini.</p>
            @endforeach
        </div>
    </div>
@endsection

@section('styles')
<style>
    .card-hover:hover {
        transform: translateY(-5px);
        transition: 03s;
    }
</style>
@endsection --}}

{{-- @section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('.toggle-status').on('click', function (e) {
            e.preventDefault();
            let url = $(this).data('url');

            $.post(url, { _token: '{{ csrf_token() }}' }, function (response) {
                // Tampilkan toast manual
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500
                });

                // Optional: reload sebagian table aja, biar smooth
                location.reload();
            });
        });
    </script>
@endsection --}}