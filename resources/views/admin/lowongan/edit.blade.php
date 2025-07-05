@extends('layouts.master')

@section('section')

    <x-alert />

    <div class="page-heading">
        <h3>Edit Lowongan</h3>
    </div>

    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card shadow-sm shadow-secondary">
                    <div class="card-header">
                        <h4 class="card-title">Form Edit Lowongan</h4>
                    </div>
                    <div class="card-body">
                        {{-- Validate Error --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Ups!</strong> Ada kesalahan input:<br><br>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{-- Content Utama --}}
                        <form action="{{ route('admin.lowongan.update', $lowongan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Judul --}}
                            <div class="form-group mb-3">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control shadow-sm shadow-secondary"
                                    value="{{ old('judul', $lowongan->judul)  }}" required>
                            </div>

                            {{-- Tanggal Buka --}}
                            <div class="form-group mb-3">
                                <label>Tanggal Buka</label>
                                <input type="date" name="tanggal_buka" class="form-control shadow-sm shadow-secondary"
                                    value="{{ old('tanggal_buka', $lowongan->tanggal_buka) }}">
                            </div>

                            {{-- Tanggal Tutup --}}
                            <div class="form-group mb-3">
                                <label>Tanggal Tutup</label>
                                <input type="date" name="tanggal_tutup" class="form-control shadow-sm shadow-secondary"
                                    value="{{ old('tanggal_tutup', $lowongan->tanggal_tutup) }}">
                            </div>

                            {{-- Pengalaman --}}
                            <div class="form-group mb-3">
                                <label for="pengalaman">Pengalaman</label>
                                <select name="pengalaman" class="form-control shadow-sm shadow-secondary" required>
                                    <option value="fresh_graduate" {{ old('pengalaman', $lowongan->pengalaman ?? '') == 'fresh_graduate' ? 'selected' : ''}}>Fresh Graduate</option>
                                    <option value="experienced" {{ old('pengalaman', $lowongan->pengalaman ?? '') == 'experienced' ? 'selected' : ''}}>Experienced</option>
                                </select>
                            </div>

                            {{-- Kategori --}}
                            <div class="form-group mb-3">
                                <label>Kategori</label>
                                <select name="category_id" class="form-select shadow-sm shadow-secondary" required> {{-- sebelum category ada DB nya sendiri | name="kategori" class="form-control"
                                    <option value="Technology" {{ old('kategori', $lowongan->kategori ?? '') == 'Technology' ? 'selected' : '' }}>Technology</option>
                                    <option value="Marketing" {{ old('kategori', $lowongan->kategori ?? '') == 'Marketing' ? 'selected' : ''}}>Marketing</option>
                                    <option value="Finance" {{ old('kategori', $lowongan->kategori ?? '') == 'Finance' ? 'selected' : ''}}>Finance</option>
                                    <option value="Human Resources" {{ old('kategori', $lowongan->kategori ?? '') == 'Human Resources' ? 'selected' : ''}}>Human Resources</option>    
                                    --}}
                                    <option disabled selected>Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $lowongan->category_id ?? '') == $category->id ? 'selected' : ''}}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Upload Gambar (Opsional) --}}
                            <div class="form-group mb-3">
                                <label for="gambar" class="form-label">Gambar (Opsional)</label>
                                <div class="shadow-sm shadow-secondary">
                                    <input type="file" name="gambar" id="gambar" 
                                        class="form-control @error('gambar') is-invalid @enderror" 
                                        accept=".jpg,.jpeg,.png">
                                    @error('gambar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Deskripsi --}}
                            <div class="form-group mt-3">
                                <label>Deskripsi & Reqirement</label>
                                <div class="shadow-sm shadow-secondary">
                                    <!-- <div id="quill-deskripsi" class="quill-editor" style="height: 200px">
                                        {!! old('deskripsi', $lowongan->deskripsi ?? '') !!}
                                    </div>
                                    <input type="hidden" name="deskripsi" id="deskripsi"> -->
                                    <textarea name="deskripsi" class="form-control summernote-form">{{ old('deskripsi', $lowongan->deskripsi) }}</textarea> {{-- id="summernote-deskripsi" | class="form-control tinymce" | --}}
                                </div>
                            </div>

                            {{-- Lokasi --}}
                            <div class="form-group mb-3">
                                <label>Penempatan (Lokasi)</label>
                                <input type="text" name="lokasi" class="form-control shadow-sm shadow-secondary"
                                    value="{{ old('lokasi', $lowongan->lokasi) }}">
                            </div>

                            {{-- Status --}}
                            <div class="form-group mb-3">
                                <label>Status</label>
                                <select name="status" class="form-control shadow-sm shadow-secondary" required>
                                    <option value="aktif" {{ old('status', $lowongan->status ?? '') == 'aktif' ? 'selected' : ''}}>Aktif</option>
                                    <option value="non-aktif" {{ old('status', $lowongan->status ?? '') == 'non-aktif' ? 'selected' : ''}}>Non-aktif</option>
                                </select>
                            </div>

                            {{-- Fitur tambahan biar Admin Flexible upload Link GForm Lowongan --}}
                            <div class="form-group mb-3">
                                <label for="link">Link Google Form (Optional)</label>
                                <input type="text" name="link" class="form-control shadow-sm shadow-secondary" value="{{ old('link', $lowongan->link ?? '') }}">
                            </div>

                            {{-- Tombol --}}
                            <button type="submit" class="btn btn-primary mt-4 shadow-sm shadow-secondary">
                                <i class="bi bi-save"></i> Update
                            </button>

                            <a href="{{ route('admin.lowongan.index') }}" class="btn btn-secondary mt-4 shadow-sm shadow-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- @include('components.summernote') --}}
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('.summernote-form').summernote({
            height  : 300,
            toolbar : [
                ['style', ['bold', 'italic', 'underline', 'clear', 'strikethrough', 'superscript', 'subscript']],
                ['font', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph', 'height']],
                ['view', ['codereview']]
            ]
        });
    });
</script>
@endpush