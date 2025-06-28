@extends('layouts.master')

@section('section')

<div class="page-heading">
    <h3>Detail Lowongan</h3>
</div>

{{-- Conten Div Card Utama --}}
<div class="page-content">
    <section class="row">
        <div class="col-12">

            <div class="card shadow-sm shadow-secondary">
                <div class="card-header">
                    <h4>{{ $lowongan->judul }}</h4>
                    <small class="text-muted">
                        Diposting pada {{ optional($lowongan->created_at)->format('d M Y') }}
                    </small>
                </div>
                <div class="card-body">

                    <div class="mb-3 d-flex gap-2 flex-wrap">
                        {{-- Kategori --}}
                        {{-- ⌛ Logic lama ketika masih pakai Kategori belum dipisah DB categories
                        <span class="badge bg-info">
                            @if ($lowongan->kategori === 'Technology')
                                <i class="bi bi-cpu me-1"></i> Technology 
                            @elseif ($lowongan->kategori === 'Marketing')
                                <i class="bi bi-briefcase me-1"></i> Marketing
                            @elseif ($lowongan->kategori === 'Finance')
                                <i class="bi bi-coin me-1"></i> Finance
                            @elseif ($lowongan->kategori === 'Human Resources')
                                <i class="bi bi-people me-1"></i> Human Resources
                            @else
                                <i class="bi bi-tags me-1"></i> {{ ucfirst($lowongan->category_id) }}
                            @endif  
                        </span>
                        --}}
                        <span class="badge bg-info">
                            @php
                                $icon = match($lowongan->category->name ?? '') {
                                    'Technology'        => 'bi-cpu',
                                    'Marketing'         => 'bi-briefcase',
                                    'Finance'           => 'bi-coin',
                                    'Human Resources'   => 'bi-people',
                                    default             => 'bi-tags'
                                };
                            @endphp
                            <i class="bi {{ $icon }} me-1"></i>
                            {{ $lowongan->category->name ?? '-' }}
                        </span>

                        {{-- Pengalaman --}}
                        <span class="badge bg-warning text-dark">
                            @if ($lowongan->pengalaman === 'fresh_graduate')
                                <i class="bi bi-person-plus me-1"></i> Fresh Graduate
                            @elseif ($lowongan->pengalaman === 'experienced')
                                <i class="bi bi-person-check me-1"></i> Experienced
                            @else
                                <i class="bi bi-question-circle me-1"></i> {{ ucfirst($lowongan->pengalaman) }}
                            @endif 
                            {{-- {{ str_replace('_', ' ', ucfirst($lowongan->pengalaman)) }} --}}
                        </span>
                        
                        {{-- Status --}}
                        @if ($lowongan->status === 'aktif')
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle me-1"></i> Aktif
                            </span>
                        @else
                            <span class="badge bg-danger">
                                <i class="bi bi-x-circle me-1"></i> Nonaktif
                            </span>
                        @endif
                        <!-- @if ($lowongan->status == 'aktif')
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Nonaktif</span>
                        @endif -->
                    </div>

                    <p><strong>Lokasi :</strong> 
                        {{ $lowongan->lokasi }}
                    </p>

                    <p><strong>Kategori :</strong> 
                        {{-- Pakek BG buat seperti badge
                        <span class="badge bg-info">
                            <i class="bi bi-tags"></i>{{ $lowongan->category->name ?? '-' }} 
                        </span>
                        --}}
                        {{ $lowongan->category->name ?? '-' }}
                    </p>

                    <div class="mt-3">
                        <p><strong>Deskripsi :</strong></p>
                        <div>{!! $lowongan->deskripsi !!}</div>
                    </div>

                    @if ($lowongan->requirement)
                        <div class="mt-3">
                            <p><strong>Requirement :</strong></p>
                            <div>{!! $lowongan->requirement !!}</div>
                        </div>
                    @endif

                    @if ($lowongan->link)
                        <div class="mb-3">
                            <label class="form-label fw-bold">Link Formulir Pendaftaran</label><br>
                            <a href="{{ $lowongan->link }}" target="_blank" class="btn btn-sm btn-outline-info shadow-sm">
                                {{ $lowongan->link }}
                            </a>
                        </div>
                    @endif

                    <!-- <p><strong>Status:</strong>  -->
                        
                    <!-- </p> -->
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.lowongan.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>

        </div>
    </section>
</div>

@endsection
