{{-- @extends('layouts.user')

@section('content')
    <div class="container mt-5">
    🔙 Tombol Kembali
        <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm mb-3">← Kembali ke Daftar Lowongan</a>

        <div class="card shadow">
            <div class="card-body">
                Judul
                <h5 class="card-title">{{ $lowongan->judul }}</h5>

                Status
                @if ($lowongan->status === 'aktif')
                    <span class="badge badge-success">Dibuka</span>
                @else
                    <span class="badge badge-secondary mb-2">Tutup</span>
                @endif

                Deskripsi
                <p class="card-text mt-3" style="white-space: pre-line;">{{ $lowongan->deskripsi }}</p>

                Tombol Detail
                <a href="{{ route('user.show', $lowongan->id) }}" class="btn btn-primary mt-2">
                    Lihat Detail
                </a>

                Tombol Apply (Bonus)
                @if ($lowongan->status == 1)
                    <a href="https://forms.gle/ISI_LINK_GOOGLE_FORM" target="_blank" class="btn btn-primary mt-3">
                        Lamar Sekarang
                    </a>
                    ⬆️Link bisa di ganti sesuai dengan kebutuhan Perusahaan
                @endif 
            </div>
        </div>
    </div>
@endsection --}}