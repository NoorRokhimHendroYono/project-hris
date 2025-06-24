@extends('layouts.master')

@section('section')
<div class="container mt-5">
    <h4 class="text-center mb-4">Lupa Password Admin❔🤔</h4>

    <form action="{{ route('admin.forgot.send') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email Admin</label>
            <input type="email" name="email" class="form-control mt-1" required placeholder="Masukkan Email Anda">
        </div>

        <button type="submit" class="btn btn-outline-primary btn-sm">Kirim Link Reset</button>
        <a href="{{ route('admin.login') }}" type="button" class="btn btn-outline-secondary btn-sm">Kembali ke Login</a>
    </form>
    <!-- <div class="mt-3">
    </div> -->
</div>
@endsection