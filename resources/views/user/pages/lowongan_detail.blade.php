@extends('user.layouts.master')

@section('content')
<div class="container mt-5">
    <h2 class="mb-3">{{ $lowongan->judul }}</h2>
    <p><strong>Penempatan:</strong> {{ $lowongan->lokasi }}</p>
    <p><strong>Status:</strong> {{ ucfirst($lowongan->status) }} </p>

    <hr>

    <h4>Deskripsi Pekerjaan</h4>
    <div>{!! $lowongan->requirement !!}</div>

    <h4 class="mt-4">Requirement</h4>
    <div>{!! $lowongan->requirement !!}</div>

    @if($lowongan->benefit)
    <h4 class="mt-4">Benefit</h4>
    <div>{!! $lowongan->benefit !!}</div>
    @endif

    <a href="{{ route('user.home') }}" class="btn btn-secondary mt-4">⬅️ Kembali ke Daftar Lowongan</a>
</div>
@endsection