@extends('layouts.master')

@section('section')

    <x-alert />

    <div class="page-heading">
        <h3>Tambah Lowongan</h3>
    </div>

    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card shadow-sm shadow-secondary">
                    <div class="card-header">
                        <h4 class="card-title">Form Tambah Lowongan</h4>
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
                        <form action="{{ route('admin.lowongan.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control shadow-sm shadow-secondary" value="{{ old('judul') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Tanggal Buka</label>
                                <input type="date" name="tanggal_buka" class="form-control shadow-sm shadow-secondary"
                                    value="{{ old('tanggal_buka') }}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Tanggal Tutup</label>
                                <input type="date" name="tanggal_tutup" class="form-control shadow-sm shadow-secondary"
                                    value="{{ old('tanggal_tutup') }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="pengalaman">Pengalaman</label>
                                <select name="pengalaman" class="form-control shadow-sm shadow-secondary" required>
                                    <option value="fresh_graduate" {{ old('pengalaman', $lowongan->pengalaman ?? '') == 'fresh_graduate' ? 'selected' : ''}}>Fresh Graduate</option>
                                    <option value="experienced" {{ old('pengalaman', $lowongan->pengalaman ?? '') == 'experienced' ? 'selected' : ''}}>Experienced</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Kategori</label>
                                <select name="category_id" class="form-select shadow-sm shadow-secondary" required> {{-- sebelum category ada DB nya sendiri | name="kategori" class="form-control" 
                                    <option value="Technology" {{ old('kategori', $lowongan->kategori ?? '') == 'Technology' ? 'selected' : '' }}>Technology</option>
                                    <option value="Marketing" {{ old('kategori', $lowongan->kategori ?? '') == 'Marketing' ? 'selected' : ''}}>Marketing</option>
                                    <option value="Finance" {{ old('kategori', $lowongan->kategori ?? '') == 'Finance' ? 'selected' : ''}}>Finance</option>
                                    <option value="Human Resources" {{ old('kategori', $lowongan->kategori ?? '') == 'Human Resources' ? 'selected' : ''}}>Human Resources</option>    
                                    --}}
                                    {{-- yang kedua 2️⃣, kategori di DB
                                    <option disabled {{ old('category_id') ? '' : 'selected' }}>Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $lowongan->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                    --}}
                                    <option value="" disabled {{ old('category_id', $lowongan->category_id ?? '') == '' ? 'selected' : '' }}>
                                        -- Pilih Kategori --
                                    </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $lowongan->category_id ?? '') == $category->id ? 'selected' : ''}}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Deskripsi (Job Desk)</label>
                                <div class="shadow-sm shadow-secondary">
                                    <div id="quill-deskripsi" class="quill-editor">
                                        {!! old('deskripsi', $lowongan->deskripsi ?? '') !!}
                                    </div>
                                    <input type="hidden" name="deskripsi" id="deskripsi">
                                    <!-- <textarea name="deskripsi" class="form-control summernote">{{ old('deskripsi', $lowongan->deskripsi ?? '') }}</textarea> {{-- id="summernote-deskripsi" | class="form-control tinymce" | class="form-control" --}} -->
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Reqirement / Syarat</label>
                                <div class="shadow-sm shadow-secondary">
                                    <div id="quill-requirement" class="quill-editor">
                                        {!! old('requirement', $lowongan->requirement ?? '') !!}
                                    </div>
                                    <input type="hidden" name="requirement" id="requirement">
                                    <!-- <textarea name="requirement" class="form-control summernote">{{ old('requirement', $lowongan->requirement ?? '') }}</textarea> {{-- id="summernote-requirement" | class="form-control tinymce" | class="form-control" --}} -->
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Penempatan (Lokasi)</label>
                                <input type="text" name="lokasi" class="form-control shadow-sm shadow-secondary" value="{{ old('lokasi') }}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Status</label>
                                <select name="status" class="form-control shadow-sm shadow-secondary">
                                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="non-aktif" {{ old('status') == 'non-aktif' ? 'selected' : ''}}>Tidak Aktif
                                    </option>
                                </select>
                            </div>

                            {{-- Fitur tambahan biar Admin Flexible upload Link GForm Lowongan --}}
                            <div class="form-group mb-3">
                                <label for="link">Link Google Form (Optional)</label>
                                <input type="text" name="link" class="form-control shadow-sm shadow-secondary" value="{{ old('link', $lowongan->link ?? '') }}">
                            </div>

                            <button type="submit" class="btn btn-primary mt-4 shadow-sm shadow-secondary">
                                <i class="bi bi-save"></i> Upload
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

{{-- 
Buat jaga-jaga
@push('scripts')
<script>
    $(document).ready(function () {
        if ($('.summernote').lenght) {
            $('.summernote').summernote({
                placeholder: 'Tulis konten di sini...',
                tabsize: 2,
                height: 300
            });
        }
    });
</script>
@endpush
--}}

{{-- @section('script')
//✅ Summernote via CDN//
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function () {
        $('textarea[name="deskripsi"], textarea[name="requirement"]').summernote({
            height: 300,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['codereview']]
            ]
        });
    });
</script>
@endsection --}}

{{-- 
@push('scripts')
    <script src="{{ asset('assets/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector    : 'textarea.tinymce',
            plugins     : 'lists link image table code',
            toolbar     : 'undo redo | styles | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | link image | code',
            height      : 300,
        });
    </script>
@endpush
--}}

    {{-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}

    {{-- 
    @section('script')

    <!-- Summernote Textarea Form-Control Deskripsi & Requirement -->
    <link rel="stylesheet" href="{{ asset('assets/summernote/summernote-lite.min.css') }}">
    <script src="{{ asset('assets/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('assets/summernote/summernote-init.js') }}"></script>

    @endsection
    --}}

    {{-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}


    {{-- ✅ TinyMCE via local (versi 7.x) --}}
    {{--
    <script src="{{ asset('assets/js/tinymce/tinymce.min.js') }}"></script> --}}
    {{-- TinyMCE CDN ver 6... --}}
    {{--
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> 
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
    --}}
    

    {{-- 
    <script>
        // Deskripsi ➔ Full fitur
        tinymce.init({
            selector: 'textarea[name="deskripsi"]', // ✅ Khusus target textarea kamu
            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
            toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | preview code fullscreen',
            menubar: 'file edit view insert format tools table help',
            height: 300,
            branding: false // ilangin logo tiny
            //skin_url: '/assets/js/tinymce/skins/ui/oxide',
            //content_css: '/assets/js/tinymce/skins/content/default/content.css'
        });

        // Requirement ➔ Simple fitur
        tinymce.init({
            selector: 'textarea[name="requirement"]',
            plugins: 'lists link',
            toolbar: 'bold italic underline | bullist numlist | link',
            menubar: false,
            height: 200,
            branding: false
        });

        // Benefit➔ Simple fitur (kalau nanti kamu ada field Benefit, udah siap)
        tinymce.init({
            selector: 'textarea[name="benefit"]',
            plugins: 'lists link',
            toolbar: 'bold italic underline | bullist numlist | link',
            menubar: false,
            height: 200,
            branding: false
        });

        // Penempatan (Lokasi) ➔ langsung text biasa (tanpa editor) ❌ (jadi kosongin aja)
        // ➔ Jadi gausah init(), biarkan dia textarea polos 
    </script>
    --}}

    {{-- Konfigurasi JS TinyMCE untuk Upload Gambar --}}
    
    {{-- 
    <script>
        tinymce.init({
            selector: 'textarea#deskripsi',
            plugins: 'image code link lists',
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | image code',
            automatic_uploads: true,
            images_upload_url: '/admin/upload-image',
            relative_urls: false,
            remove_script_host: false,
            convert_urls: true,
            file_picker_types: 'image',
            file_picker_callback: function(callback, value, meta) {
                if (meta.filetype === 'image') {
                    let input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.onchange = function() {
                        let file = this.files[0];
                        let reader = new FileReader();

                        reader.onload = function () {
                            let id = 'blobid' + (new Date()).getTime();
                            let blobCache = tinymce.activeEditor.editorUpload.blobCache;
                            let base64 = reader.result.split(',')[1];
                            let blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            callback(blobInfo.blobUri(), { title: file.name });
                        };
                        reader.readAsDataURL(file);
                    };

                    input.click();
                }
            },
            images_upload_handler: function (blobInfo, success, failure) {
                let xhr, formData;

                xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/upload-image');
                xhr.setRequestHeader('X-CSRF-Token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

                xhr.onload = function() {
                    if (xhr.status !== 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    let json = JSON.parse(xhr.responseText);
                    if (!json || typeof json.location !== 'string') {
                        failure('Invalid response from server');
                        return;
                    }

                    success(json.location);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            }
        });
    </script>
    --}}

    {{-- 
    <script>
        tinymce.init({
            selector: 'textarea#deskripsi',
            plugins: 'image code lists link',
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code | image',
            relative_urls: false,
            remove_script_host: false,
            convert_urls: true,
            images_upload_url: '/admin/upload-image',
            automatic_uploads: true,
            images_upload_handler: function (blobInfo, success, failure) {
                let xhr, formData;

                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '/admin/upload-image');

                xhr.setRequestHeader("X-CSRF-Token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

                xhr.onload = function () {
                    let json;

                    if (xhr.status !== 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.location);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);
            }
        });
    </script>
    --}}

    {{-- 
    <script>
        tinymce.init({
            selector: 'textarea#deskripsi',
            plugins: 'image code',
            toolbar: 'undo redo | link image | code',
            images_upload_url: '{{ route("tinymce.upload") }}',
            images_upload_handler: function (blobInfo, success, failure) {
                let formData = new FormData();
                formData.append('file', blobInfo.blob());

                fetch('{{ route("tinymce.upload") }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(result => {
                    if (result.location) {
                        success(result.location);
                    } else {
                        failure('Upload gagal');
                    }
                })
                .catch(() => failure('Upload error'));
            }
        });

    </script>
    --}}

    {{-- TinyMCE CDN --}}
    {{-- 
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector                    : 'textarea.tinymce',
            plugins                     : 'image code link lists table',
            toolbar                     : 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | image code',
            height                      : 400,
            automatic_uploads           : true,
            images_upload_url           : '{{ route('admin.upload.image') }}',
            images_upload_credentials   : true,
            file_picker_types           : 'image',
            relative_urls               : false,
            remove_script_host          : false,

            file_picker_callback: function (cb, value, meta) {
                if (meta.filetype === 'image') {
                    let input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.onchange = function () {
                        let file = this.files[0];
                        let formData = new FormData();
                        formData.append('file', file);

                        fetch('{{ route('admin.upload.image') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: formData
                        })
                        .then(res => res.json())
                        .then(data => {
                            cb(data.location); // URL gambar dikembalikan Laravel
                        })
                        .catch(err => {
                            console.error(err);
                            alert('Upload gambar gagal.');
                        });
                    };

                    input.click();
                }
            }
        });
    </script>
    --}}

    {{-- TinyMCE CDN --}}
    {{-- 
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea.tinymce',
            plugins: 'image', <!-- 'image code link lists table' ->
            toolbar: 'image', <!-- 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | image code' -->
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
            if (meta.filetype === 'image') {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function () {
                    const file = this.files[0];
                    const reader = new FileReader();

                    reader.onload = function() {
                        callback(reader.result, { alt: file.name});
                    };

                    reader.readAsDataURL(file);
                };

                input.click();
                }
            }
        });
    </script>
    --}}

    {{-- 
    <script>
        tinymce.init({
            selector                    : 'textarea.tinymce',
            plugins                     : 'image link code',
            toolbar                     : 'undo redo | styleselect | bold italic | mage link | code',
            images_upload_url           : '{{ route("tinymce.upload") }}',
            images_upload_credentials   : true,
            file_picker_types           : 'image',
            file_picker_callback        : function (cb, value, meta) {
                let input = documet.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange      = function () {
                    let file        = this.files [0];
                    let formData    = new FormData();
                    formData.append('file', file);

                    fetch('{{ route("tinymce.upload") }}', {
                        method  : 'POST',
                        headers : { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        body    : formData
                    })
                    .then(res   => res.json())
                    .then(data  => cb(data.location));
                };
                input.click();
            }
        });
    </script>
    --}}