@extends('layouts.user')

@section('content')
    <div class="container mt-5">
        <h2>{{ $lowongan->judul }}</h2>
        <p><strong>Lokasi       :</strong> {{ $lowongan->lokasi }}</p>
        <p><strong>Status       :</strong>
            @if ($lowongan->status == 'aktif')
                <span class="badge bg-success">Aktif</span>
            @else
                <span class="badge bg-secondary">Tutup</span>
            @endif
        </p>
        <p><strong>Deskripsi    :</strong> {{ $lowongan->deskripsi }}</p>

        {{-- Tombol kembali --}}
        <a href="{{ route('user.lowongan.list') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
@endsection