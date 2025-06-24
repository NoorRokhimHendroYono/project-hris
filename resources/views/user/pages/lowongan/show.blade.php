@extends('user.layouts.main')

@section('content')
    <div class="container py-5">
        <h2 class="mb-3">{{ $lowongan->judul }}</h2>
        <p class="text-muted">Diposting pada {{ $lowongan->created_at->format('d M Y') }}</p>

        <div class="mb-4 d-flex flex-wrap gap-2">
            {{-- Badge Kategori --}}
            <span class="badge bg-info">
                @php
                    $icon = match ($lowongan->category->name ?? '') {
                        'Technology'        => 'bi-cpu',
                        'Marketing'         => 'bi-briefcase',
                        'Finance'           => 'bi-coin',
                        'Human Resources'   => 'bi-people',
                        default             => 'bi-tags'
                    };
                @endphp
                <i class="bi {{ $icon }}"></i> {{ $lowongan->category->name ?? '-' }}
            </span>

            {{-- Badge Pengalaman --}}
            <span class="badge bg-warning text-dark">
                <i class="bi {{ $lowongan->pengalaman === 'experienced' ? 'bi-person-check' : 'bi-person-plus' }}"></i>
                {{ $lowongan->pengalaman === 'experienced' ? 'Experienced' : 'Fresh Graduate' }}
            </span>

            {{-- Status --}}
            <span class="badge {{ $lowongan->status === 'aktif' ? 'bg-success' : 'bg-danger' }}">
                <i class="bi {{ $lowongan->status === 'aktif' ? 'bi-check-circle' : 'bi-x-circle'}}"></i>
                {{ ucfirst($lowongan->status) }}
            </span>
        </div>

        <p><strong>Lokasi :</strong> {{ $lowongan->lokasi }}</p>

        <div class="mt-4">
            <h5>Deskripsi</h5>
            <div>{!! $lowongan->deskripsi !!}</div>
        </div>

        <div class="mt-4">
            <h5>Requirement</h5>
            <div>{!! $lowongan->requirement !!}</div>
        </div>

        <a href="{{ route('user.careers') }}" class="btn btn-secondary mt-4">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
@endsection