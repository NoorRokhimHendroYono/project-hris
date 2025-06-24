@extends('layouts.master')

@section('section')

    <x-alert />

    <div class="page-heading">
        <h3>Tambah Category</h3>
    </div>

    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card shadow-sm shadow-secondary">
                    <div class="card-header">
                        <h4 class="card-title">Form Tambah Category</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.category.store') }}"> {{-- isset($category) ? route('admin.category.store', $category->id) :  --}}
                            @csrf
                            @if(isset($category)) @method('PUT') @endif
                            <div class="form-group mb-3">
                                <label for="name">Category</label>
                                <input type="text" name="name" class="form-control shadow-sm shadow-secondary" placeholder="New Category Sir?" value="{{ old('name', $category->name ?? '') }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4"> {{-- {{ isset($category) ? 'Update' : 'Tambah' }} --}}
                                <i class="bi bi-save"></i> {{ isset($category) ? 'Update' : 'Add' }}
                            </button>

                            <a href="{{ route('admin.category.index') }}" class="btn btn-secondary mt-4">
                                <i class="bi bi-arrow-left"></i> Back
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection