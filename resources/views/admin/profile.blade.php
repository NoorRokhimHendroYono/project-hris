@extends('layouts.master')

@section('section')

    <x-alert />

    <div class="page-heading">
        <h3>Profil Admin</h3>
    </div>

    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Nama --}}
                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $admin->name) }}"
                            required>
                    </div>

                    {{-- Email --}}
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $admin->email) }}"
                            required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">
                        <i class="bi bi-save"></i> Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection







{{-- Foto Profil --}}
<!-- <div class="form-group mb-3">
                        @if ($admin->profile_photo)
                            <img src="{{ asset('uploads/admin/' . $admin->profile_photo) }}" width="100" class="rounded-circle">
                        @else
                            <img src="{{ asset('uploads/admin/default.png') }}" width="100" class="rounded-circle">
                        @endif
                        <input type="file" name="profile_photo" class="form-control mt-2">
                    </div> -->



<!-- {{-- Password --}}
                    <div class="mb-3">
                        <label>Password Baru (Opsional)</label>
                        <input type="password" name="password" class="form-control"
                            placeholder="Kosongkan jika tidak ganti">
                    </div> -->