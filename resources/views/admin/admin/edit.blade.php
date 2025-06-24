@extends('layouts.master')

@section('section')

<x-alert/>

<div class="page-heading">
    <h3>Edit Admin</h3>
</div>

<div class="page-content">
    <form action="{{ route('admin.admins.update', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card shadow-sm shadow-secondary">
            <div class="card-body">

                {{-- Nama --}}
                <div class="form-group mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control shadow-sm shadow-secondary" value="{{ old('name', $admin->name) }}" required>
                </div>

                {{-- Email --}}
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control shadow-sm shadow-secondary" value="{{ old('email', $admin->email) }}" required>
                </div>

                {{-- Password (Opsional) --}}
                <div class="form-group mb-3">
                    <label>Password (Biarkan KOSONG jika tidak diubah.)</label>
                    <input type="password" name="password" class="form-control shadow-sm shadow-secondary" placeholder="Kosongkan jika tidak diubah">
                </div>

                {{-- Tombol --}}
                <button type="submit" class="btn btn-primary mt-4 shadow-sm shadow-secondary">
                    <i class="bi bi-save"></i> Update
                </button>

                <a href="{{ route('admin.admins.list') }}" class="btn btn-secondary mt-4 shadow-sm shadow-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </form>
</div>

@endsection
