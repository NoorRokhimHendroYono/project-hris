@extends('layouts.master')

@section('section')

    <x-alert />

    <div class="page-heading">
        <h3>Keamanan Akun</h3>
    </div>

    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.security.update') }}">
                    @csrf
                    @method('PUT')

                    {{-- Password Sekarang --}}
                    <div class="form-group mb-3">
                        <label>Password Sekarang</label>
                        <input type="password" name="current_password" class="form-control" required>
                    </div>

                    {{-- Password baru --}}
                    <div class="form-group mb-3">
                        <label>Password Baru</label>
                        <input type="password" name="new_password" class="form-control" required>
                    </div>

                    {{-- Konfirmasi Password Baru --}}
                    <div class="form-group mb-3">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" name="new_password_confirmation" class="form-control" required>
                    </div>

                    {{-- Tombol --}}
                    <button type="submit" class="btn btn-warning mt-3">
                        <i class="bi bi-key"></i> Ubah Password {{-- <i class="bi bi-shield-lock"></i> Ubah Password --}}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection